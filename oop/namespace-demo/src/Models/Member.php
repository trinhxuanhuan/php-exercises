<?php
declare(strict_types=1);
namespace App\Models;
use App\Traits\HasTimestamps;
use InvalidArgumentException;
class Member{
    use HasTimestamps;
    public function __construct(public readonly int $id, public readonly string $name){
        if($id <=0 ){
            throw new InvalidArgumentException(
                "Mã thành viên phải là số nguyên dương!"
            );
        }
        if(trim($name)===""){
            throw new InvalidArgumentException(
                "Tên thành viên không được để trống!"
            );
        }
        $this->initializeTimestamp();
    }
}