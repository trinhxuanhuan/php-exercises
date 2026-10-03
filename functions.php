<?php
function getBookStatus($availableCopies){
    if($availableCopies > 0){
        return "Có thể mượn";
    }
    elseif($availableCopies < 0){
        return "Lỗi! Số bản sách không được âm";}
    return "Đã hết sách";
}
echo getBookStatus(3) .PHP_EOL;
echo getBookStatus(0) .PHP_EOL;
echo getBookStatus(-1) .PHP_EOL;

