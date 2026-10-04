<?php
function countWords($text){
    $cleanText = trim($text);
    if($cleanText === ""){
        return 0;
    }
    $words = preg_split("/\s+/", $cleanText);
    return count($words);
}
echo countWords("Hoc PHP moi ngay").PHP_EOL;
echo countWords(" Hoc PHP ").PHP_EOL;
echo countWords(" ").PHP_EOL;