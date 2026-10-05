<?php

class Book
{
    public string $title;
    private int $availableCopies;
    public function __construct(string $title , int $availableCopies){
        $this-> title = $title;
        $this-> availableCopies = $availableCopies;
    }
    public function getAvailableCopies() : int{
        return $this->availableCopies;
    }
    public function borrow(): bool{
        if($this-> availableCopies <= 0){
            return false;
        }
        $this->availableCopies--;
        return true;
    }

    public function getStatus() : string
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
// $firstBook = $books[0];
// if($firstBook->borrow()){
//     echo"Mượn thành công sách: ". $firstBook->title .PHP_EOL;
// }
// else{
//     echo "không thể mượn! sách đã hết".PHP_EOL;
// }
foreach ($books as $index => $book) {
    echo PHP_EOL . "Thông tin sách thứ " . ($index + 1) . PHP_EOL;
    echo "Tên sách: " . $book->title . PHP_EOL;
    echo "Số bản: " . $book->getavailableCopies() . PHP_EOL;
    echo "Trạng thái: " . $book->getStatus() . PHP_EOL;
}

do{
    echo "Bạn muốn mượn sách thứ mấy? ".PHP_EOL;
    $input = trim(fgets(STDIN));
    $choice = filter_var($input, FILTER_VALIDATE_INT);
    $invalidChoice = ($choice === false || $choice < 1 || $choice > count($books));
    if($invalidChoice){
        echo"Lỗi, hãy chọn số thứ tự có trong danh sách". PHP_EOL;
    }

}while($invalidChoice);
$selectBook = $books[$choice - 1];
if ($selectBook->borrow()) {
    echo "Mượn thành công" . PHP_EOL;
} else {
    echo "Sách đã hết, không thể mượn" . PHP_EOL;
}

// $testBook = new Book("Sach thu", 1);
// var_dump($testBook->borrow());
// var_dump($testBook->borrow());
// echo "so ban con lai: ". $testBook->getAvailableCopies() .PHP_EOL;