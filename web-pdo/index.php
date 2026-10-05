<?php
require __DIR__ . "/database.php";

// Gửi câu SQL đến MySQL để lấy danh sách sách.
$statement = $pdo->query(
    "SELECT id, title, available_copies FROM books ORDER BY id"
);

// Lấy tất cả các dòng kết quả thành một mảng.
$books = $statement->fetchAll();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sách</title>
</head>
<body>
    <h1>Danh sách sách</h1>

    <?php if ($books === []): ?>
        <p>Chưa có sách nào.</p>
    <?php else: ?>
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>Mã sách</th>
                    <th>Tên sách</th>
                    <th>Số bản còn lại</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?php echo $book["id"]; ?></td>

                        <td>
                            <?php
                            echo htmlspecialchars(
                                $book["title"],
                                ENT_QUOTES,
                                "UTF-8"
                            );
                            ?>
                        </td>

                        <td>
                            <?php echo $book["available_copies"]; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>