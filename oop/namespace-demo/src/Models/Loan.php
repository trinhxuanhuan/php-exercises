<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\LoanStatus;
use App\Traits\HasTimestamps;
use RuntimeException;

class Loan
{
    use HasTimestamps;

    private LoanStatus $status;

    public function __construct(
        public readonly Book $book,
        public readonly Member $member
    ) {
        $success = $book->borrow();

        if ($success === false) {
            throw new RuntimeException("Sách đã hết, không thể mượn");
        }

        $this->status = LoanStatus::Borrowed;
        $this->initializeTimestamp();
    }

    public function getStatus(): LoanStatus
    {
        return $this->status;
    }

    public function returnBook(): void
    {
        if ($this->status === LoanStatus::Returned) {
            throw new RuntimeException("Phiếu này đã được trả sách");
        }

        $this->book->returnCopy();
        $this->status = LoanStatus::Returned;
    }
}