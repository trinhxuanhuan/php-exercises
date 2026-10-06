<?php
require __DIR__ . "/database.php";

// Kiểm tra mã sách trên URL.
$id = filter_var($_GET["id"] ?? "", FILTER_VALIDATE_INT);

if ($id === false || $id <= 0) {
    http_response_code(400);
    exit("Mã sách không hợp lệ.");
}

// Tìm sách để hiển thị thông tin xác nhận.
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

// Chỉ xóa khi người dùng gửi form xác nhận bằng POST.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $statement = $pdo->prepare(
        "DELETE FROM books WHERE id = :id"
    );

    $statement->execute(["id" => $id]);

    header("Location: index.php");
    exit;
}

$safeTitle = htmlspecialchars($book["title"], ENT_QUOTES, "UTF-8");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa sách</title>
</head>
<body>
    <h1>Xác nhận xóa sách</h1>

    <p>
        Bạn có muốn xóa sách
        <strong><?php echo $safeTitle; ?></strong>
        không?
    </p>

    <p>Sách sẽ bị xóa khỏi cơ sở dữ liệu.</p>

    <form method="post" action="delete.php?id=<?php echo $id; ?>">
        <button type="submit">Xác nhận xóa</button>
        <a href="index.php">Hủy</a>
    </form>
</body>
</html>