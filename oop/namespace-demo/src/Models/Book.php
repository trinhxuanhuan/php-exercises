<?php
declare(strict_types=1);
namespace App\Models;
use App\Interface\Borrowable;
use InvalidArgumentException;
use App\Traits\HasTimestamps;
class Book implements Borrowable{
    use HasTimestamps;
    public function __construct(public readonly string $title, private int $availableCopies){
        if(trim($title)===""){
            throw new InvalidArgumentException("Tên sách không được để trống");
        }
        if($availableCopies < 0){
            throw new InvalidArgumentException("Số bản sách không được âm");
        }
        $this->initializeTimestamp();
        
    }
    public function getAvailableCopies():int{
        return $this->availableCopies;
    }
    public function borrow():bool{
        if($this->availableCopies===0){
            return false;
        }
        $this->availableCopies--;
        return true;
    }
    public function returnCopy():void{
        $this->availableCopies++;
    }
}