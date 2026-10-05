<?php
trait HasTimestamps{
    private string $createAt;
    public function initializeTimestamp():void{
        $this -> createAt = date("Y-m-d H:i:s");
    }
    public function getCreateAt(): string{
       return $this -> createAt;
    }
}
class Book{
    use HasTimestamps;
    public function __construct(public string $title){
        $this -> initializeTimestamp();
    }
}
class Member{
    use HasTimestamps;
    public function __construct(public string $name){
        $this -> initializeTimestamp();
    }
}
$book = new Book("Lão Hạc");
echo $book->title.PHP_EOL;
echo "Thời điểm tạo: ".$book->getCreateAt().PHP_EOL;
$member = new Member("Nguyễn Văn A");
echo $member->name.PHP_EOL;
echo "Thời điểm tạo: ".$book->getCreateAt().PHP_EOL;