<?php
$title = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST["title"] ?? "");

    if ($title === "") {
        $message = "Lỗi: tên sách không được để trống.";
    } else {
        $message = "Bạn vừa nhập sách: " . $title;
    }
}

$safeTitle = htmlspecialchars($title, ENT_QUOTES, "UTF-8");
$safeMessage = htmlspecialchars($message, ENT_QUOTES, "UTF-8");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập thông tin sách</title>
</head>
<body>
    <h1>Nhập thông tin sách</h1>

    <form method="post" action="post-demo.php">
        <label for="title">Tên sách:</label>

        <input
            type="text"
            id="title"
            name="title"
            value="<?php echo $safeTitle; ?>"
        >

        <button type="submit">Gửi tên sách</button>
    </form>

    <p><?php echo $safeMessage; ?></p>
</body>
</html>