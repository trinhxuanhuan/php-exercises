<?php
declare(strict_types = 1);
namespace App\Contracts;
interface Borrowable{
    public function borrow():bool;
}