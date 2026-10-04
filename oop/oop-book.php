<?php

class Book
{
    public string $title;
    public int $availableCopies;
    public function __construct(string $title , int $availableCopies){
        $this-> title = $title;
        $this-> availableCopies = $availableCopies;
    }

    public function getStatus()
    {
        if ($this->availableCopies > 0) {
            return "Có thể mượn";
        }

        return "Đã hết sách";
    }
}

do {
    echo "Nhập số lượng đầu sách: ";
    $input = trim(fgets(STDIN));
    $quantity = filter_var($input, FILTER_VALIDATE_INT);

    $invalidQuantity = ($quantity === false || $quantity <= 0);

    if ($invalidQuantity) {
        echo "Lỗi! Số lượng đầu sách phải là số nguyên dương" . PHP_EOL;
    }
} while ($invalidQuantity);

$books = [];

for ($i = 1; $i <= $quantity; $i++) {
    echo PHP_EOL . "Nhập thông tin sách thứ " . $i . PHP_EOL;

    do {
        echo "Nhập tên sách: ";
        $title = trim(fgets(STDIN));

        if ($title === "") {
            echo "Lỗi! Tên sách không được để trống" . PHP_EOL;
        }
    } while ($title === "");

    do {
        echo "Nhập số bản sách: ";
        $copiesInput = trim(fgets(STDIN));
        $copies = filter_var($copiesInput, FILTER_VALIDATE_INT);

        $invalidCopies = ($copies === false || $copies < 0);

        if ($invalidCopies) {
            echo "Lỗi! Số bản phải là số nguyên không âm" . PHP_EOL;
        }
    } while ($invalidCopies);

    $book = new Book($title, $copies);
    $books[] = $book;
}

foreach ($books as $index => $book) {
    echo PHP_EOL . "Thông tin sách thứ " . ($index + 1) . PHP_EOL;
    echo "Tên sách: " . $book->title . PHP_EOL;
    echo "Số bản: " . $book->availableCopies . PHP_EOL;
    echo "Trạng thái: " . $book->getStatus() . PHP_EOL;
}