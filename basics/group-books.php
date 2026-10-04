<?php
$books = [
    ["title"=>"Lão Hạc", "author"=>"Nam Cao"],
    ["title"=>"Tắt đèn", "author"=>"Ngô Tất Tố"],
    ["title"=>"Chí Phèo", "author"=>"Nam Cao"],
];
$groupBooks = [];
foreach($books as $book){
    $author = $book["author"];
    $title = $book["title"];
    $groupBooks[$author][]=$title;
}
foreach($groupBooks as $author => $titles){
    echo "Tác giả: ". $author . PHP_EOL;

foreach($titles as $title){
    echo "- ".$title . PHP_EOL;
    }
}