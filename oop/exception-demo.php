<?php
declare(strict_types=1);
function checkCopies(int $copies): int{
    if($copies < 0){
        throw new InvalidArgumentException("Số bản sách không được âm");
    }
    return $copies;
}
try{
    $copies = checkCopies(-1);
    echo "Số bản hợp lệ là: ".$copies.PHP_EOL;
}catch(InvalidArgumentException $error){
    echo "Lỗi: ".$error->getMessage().PHP_EOL;
}
echo "Chương trình tiếp tục chạy".PHP_EOL;