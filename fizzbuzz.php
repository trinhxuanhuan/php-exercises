<?php
function getFizzBuzz($number){
    if($number % 15 === 0){
        return "FizzBuzz";
    }
    elseif($number % 3 === 0){
        return "Fizz";
    }
    elseif($number % 5 === 0){
        return "Buzz";
    }
    else{
        return $number;
    }
}
for($i = 1; $i <= 15; $i++){
    echo getFizzBuzz($i). PHP_EOL;
}