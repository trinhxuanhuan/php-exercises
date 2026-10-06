<?php

declare(strict_types=1);

namespace App\Interface;

interface Borrowable
{
    public function borrow(): bool;

    public function returnCopy(): void;
}