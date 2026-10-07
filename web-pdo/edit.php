<?php
require __DIR__ . "/database.php";

// Lấy mã sách từ URL và kiểm tra
$id = filter_var($_GET["id"] ?? "", FILTER_VALIDATE_INT);

if ($id === false || $id <= 0) {
    http_response_code(400);
    exit("Mã sách không hợp lệ.");
}

// Tìm sách trong database
$statement = $pdo->prepare(
    "SELECT id, title, available_copies
     FROM books
     WHERE id = :id"
);

$statement->execute(["id" => $id]);
$book = $statement->fetch();

if ($book === false) {
    http_response_code(404);
    exit("Không tìm thấy sách.");
}

// Điền dữ liệu hiện tại vào form
$title = $book["title"];
$copiesInput = (string) $book["available_copies"];
$error = "";

// Xử lý khi người dùng bấm lưu
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST["title"] ?? "");
    $copiesInput = trim($_POST["available_copies"] ?? "");

    $copies = filter_var($copiesInput, FILTER_VALIDATE_INT);

    if ($title === "") {
        $error = "Tên sách không được để trống.";
    } elseif (mb_strlen($title, "UTF-8") > 255) {
        $error = "Tên sách không được vượt quá 255 ký tự.";
    } elseif ($copies === false || $copies < 0) {
        $error = "Số bản phải là số nguyên không âm.";
    } else {
        $statement = $pdo->prepare(
            "UPDATE books
             SET title = :title,
                 available_copies = :available_copies
             WHERE id = :id"
        );

        $statement->execute([
            "title" => $title,
            "available_copies" => $copies,
            "id" => $id,
        ]);

        header("Location: index.php");
        exit;
    }
}

$safeTitle = htmlspecialchars($title, ENT_QUOTES, "UTF-8");
$safeCopies = htmlspecialchars($copiesInput, ENT_QUOTES, "UTF-8");
$safeError = htmlspecialchars($error, ENT_QUOTES, "UTF-8");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sách</title>
</head>
<body>
    <h1>Sửa sách</h1>

    <p><a href="index.php">Về danh sách sách</a></p>

    <p><?php echo $safeError; ?></p>

    <form method="post" action="edit.php?id=<?php echo $id; ?>">
        <p>
            <label for="title">Tên sách:</label>
            <input
                type="text"
                id="title"
                name="title"
                maxlength="255"
                value="<?php echo $safeTitle; ?>"
            >
        </p>

        <p>
            <label for="copies">Số bản còn lại:</label>
            <input
                type="number"
                id="copies"
                name="available_copies"
                min="0"
                step="1"
                value="<?php echo $safeCopies; ?>"
            >
        </p>

        <button type="submit">Lưu thay đổi</button>
    </form>
</body>
</html>