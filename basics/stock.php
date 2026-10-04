<?php
$availableCopies = -1;
if($availableCopies < 0){
    echo "Lỗi! Số bản sách không được âm" . PHP_EOL;

}
elseif($availableCopies > 0){
    echo "Còn sách để mượn" . PHP_EOL;
}
else {
    echo "Đã hết sách" .PHP_EOL;
}