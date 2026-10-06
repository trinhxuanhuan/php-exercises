<?php
require __DIR__ . "/database.php";

$title = "";
$copiesInput = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST["title"] ?? "");
    $copiesInput = trim($_POST["available_copies"] ?? "");

    $copies = filter_var($copiesInput, FILTER_VALIDATE_INT);

    if ($title === "") {
        $error = "Tên sách không được để trống.";
    } elseif ($copies === false || $copies < 0) {
        $error = "Số bản phải là số nguyên không âm.";
    } else {
        $statement = $pdo->prepare(
            "INSERT INTO books (title, available_copies)
             VALUES (:title, :available_copies)"
        );

        // Gửi dữ liệu và thực hiện câu SQL
        $statement->execute([
            "title" => $title,
            "available_copies" => $copies,
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
    <title>Thêm sách</title>
</head>
<body>
    <h1>Thêm sách</h1>

    <p><a href="index.php">Về danh sách sách</a></p>

    <p><?php echo $safeError; ?></p>

    <form method="post" action="create.php">
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

        <button type="submit">Lưu sách</button>
    </form>
</body>
</html>