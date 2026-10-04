<?php
for($i = 1; $i <= 10; $i++){
    if ($i % 2 == 0){
    echo "Sách số ". $i . PHP_EOL;}
}
$sum = 0;
for($i = 1; $i <= 10; $i++){
    $sum = $sum + $i;
}
echo "Tổng các số từ 1 đến 10 là: ". $sum . PHP_EOL;

$sum = 0;
for($i = 1; $i <= 10; $i++){
    if($i %2==0){
        $sum = $sum + $i;}
}
echo "Tổng các số chẵn từ 1 đến 10 là: ". $sum . PHP_EOL;