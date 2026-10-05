<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Models\Book;
use App\Models\Member;
use App\Models\Loan;

$book = new Book("Lão Hạc", 1);
$member = new Member(1, "Huấn");

try {
    $loan = new Loan($book, $member);

    echo "Người mượn: " . $loan->member->name . PHP_EOL;
    echo "Tên sách: " . $loan->book->title . PHP_EOL;
    echo "Trạng thái: " . $loan->getStatus()->value . PHP_EOL;
    echo "Số bản sau khi mượn: "
        . $book->getAvailableCopies() . PHP_EOL;

    $loan->returnBook();

    echo "Trạng thái sau khi trả: "
        . $loan->getStatus()->value . PHP_EOL;
    echo "Số bản sau khi trả: "
        . $book->getAvailableCopies() . PHP_EOL;
} catch (RuntimeException $error) {
    echo "Lỗi: " . $error->getMessage() . PHP_EOL;
}