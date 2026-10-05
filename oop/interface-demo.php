<?php
interface Borrowable{
    public function borrow():bool;
}

class Book implements Borrowable{
    private int $availableCopies;
    public function __construct(int $availableCopies){
        $this->availableCopies = $availableCopies;
    }
    public function borrow():bool{
        if($this->availableCopies <=0){
            return false;
        }
        $this->availableCopies--;
        return true;
    }
    public function getAvailableCopies():int{
        return $this -> availableCopies;
    }
}
$book = new Book(1);
echo "Mượn lần 1: ".PHP_EOL;
var_dump($book->borrow());
echo "Số bản còn lại: ".$book->getAvailableCopies().PHP_EOL;

echo "Mượn lần 2: ".PHP_EOL;
var_dump($book->borrow());
echo "Số bản còn lại: ".$book->getAvailableCopies().PHP_EOL;