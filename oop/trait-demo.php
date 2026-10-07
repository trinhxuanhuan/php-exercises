<?php

trait HasTimestamps
{
    private string $createdAt;

    public function initializeTimestamp(): void
    {
        $this->createdAt = date("Y-m-d H:i:s");
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
}

class Book
{
    use HasTimestamps;

    public function __construct(public string $title)
    {
        $this->initializeTimestamp();
    }
}

class Member
{
    use HasTimestamps;

    public function __construct(public string $name)
    {
        $this->initializeTimestamp();
    }
}

$book = new Book("Lão Hạc");
echo $book->title . PHP_EOL;
echo "Thời điểm tạo: " . $book->getCreatedAt() . PHP_EOL;

$member = new Member("Nguyễn Văn A");
echo $member->name . PHP_EOL;
echo "Thời điểm tạo: " . $member->getCreatedAt() . PHP_EOL;