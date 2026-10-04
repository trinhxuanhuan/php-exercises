<?php
$books = [
    ["title"=> "Lão Hạc","author"=> "Nam Cao","available_copies"=> 3],
    ["title"=> "Chí Phèo","author"=> "Nam Cao","available_copies"=> 0],

];
foreach($books as $book){
    echo "Tên sách: ". $book["title"]. PHP_EOL;
    echo "Tác giả: ".$book["author"]. PHP_EOL;
    echo "Số bản còn lại: ".$book["available_copies"].PHP_EOL;
    if($book["available_copies"] > 0){
        echo "Có thể mượn sách". PHP_EOL;
}
    else{
        echo "Đã hết sách!" .PHP_EOL;
}
}