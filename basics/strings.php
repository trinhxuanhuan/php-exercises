<?php
$title = " Lão Hạc ";
$cleanTitle = trim($title);
echo "Trước: [". $title . "]".PHP_EOL;
echo "Sau: [" .$cleanTitle . "]".PHP_EOL;
require __DIR__."/book-functions.php";
echo cleanBookTitle(" Lão Hạc "). PHP_EOL;
echo cleanBookTitle(" "). PHP_EOL;