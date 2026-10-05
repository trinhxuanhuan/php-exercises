<?php
session_start();

$title = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST["title"] ?? "");

    if ($title === "") {
        $message = "Lỗi: tên sách không được để trống.";
    } else {
        // Chỉ tạo danh sách rỗng khi chưa có.
        if (!isset($_SESSION["book_titles"])) {
            $_SESSION["book_titles"] = [];
        }

        // Thêm tên mới, giữ lại các tên cũ.
        $_SESSION["book_titles"][] = $title;

        $message = "Đã ghi nhớ tên sách.";

        // Xóa chữ trong ô nhập để nhập sách tiếp theo.
        $title = "";
    }
}

// Đọc danh sách đã lưu.
// Nếu chưa có thì dùng mảng rỗng.
$savedTitles = $_SESSION["book_titles"] ?? [];

$safeTitle = htmlspecialchars($title, ENT_QUOTES, "UTF-8");
$safeMessage = htmlspecialchars($message, ENT_QUOTES, "UTF-8");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ví dụ session</title>
</head>
<body>
    <h1>Ghi nhớ danh sách sách bằng session</h1>

    <form method="post" action="session-demo.php">
        <label for="title">Tên sách:</label>

        <input
            type="text"
            id="title"
            name="title"
            value="<?php echo $safeTitle; ?>"
        >

        <button type="submit">Ghi nhớ</button>
    </form>

    <p><?php echo $safeMessage; ?></p>

    <h2>Danh sách đã ghi nhớ</h2>

    <?php if ($savedTitles === []): ?>
        <p>Chưa có sách nào.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($savedTitles as $savedTitle): ?>
                <li>
                    <?php
                    echo htmlspecialchars(
                        $savedTitle,
                        ENT_QUOTES,
                        "UTF-8"
                    );
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>