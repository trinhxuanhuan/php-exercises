<?php
$books = ["Dế mèn phiêu lưu ký", "Lão Hạc", "Chí Phèo"];
echo $books[0] . PHP_EOL;
$books[] = "Tắt đèn";
foreach($books as $book){
    echo "Tên sách: ". $book . PHP_EOL;
}
echo "Tổng số lượng sách là: ". count($books) . PHP_EOL;