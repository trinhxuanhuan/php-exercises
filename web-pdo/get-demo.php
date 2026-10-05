<?php
$title = $_GET["title"] ?? "";
$safeTitle = htmlspecialchars($title, ENT_QUOTES, "UTF-8");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ví dụ GET</title>
</head>
<body>
    <h1>Nhận tên sách bằng GET</h1>

    <form method="get" action="get-demo.php">
        <label for="title">Tên sách:</label>

        <input
            type="text"
            id="title"
            name="title"
            value="<?php echo $safeTitle; ?>"
        >

        <button type="submit">Hiển thị</button>
    </form>

    <p>Tên sách: <?php echo $safeTitle; ?></p>
</body>
</html>