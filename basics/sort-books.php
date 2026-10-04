<?php
$books =[
    ["title"=> "Lão Hạc", "available_copies"=>3],
    ["title"=> "Chí Phèo", "available_copies"=>0],
    ["title"=> "Tắt Đèn", "available_copies"=>2],
];
function compareBooks($a, $b){
    return $a["available_copies"]<=>$b["available_copies"];
}
usort($books, "compareBooks");
foreach($books as $book){
    echo $book["title"]. ": ".$book["available_copies"].PHP_EOL;
}