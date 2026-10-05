<?php
abstract class LibraryItem{
    public string $title;
    public function __construct(string $title){
        $this->title = $title;
    }
    public function getTitle():string{
        return $this->title;
    }
    abstract public function getType():string;
}
class Book extends LibraryItem{
    public function getType():string{
        return "Sách";
    }
}
class Magazine extends LibraryItem{
    public function getType():string{
        return "Tạp chí";
    }
}
$book = new Book("Lão Hạc");
echo $book->getTitle().PHP_EOL;
echo $book->getType().PHP_EOL;
$magazine = new Magazine("ABC");
echo $magazine->getTitle().PHP_EOL;
echo $magazine->getType().PHP_EOL;