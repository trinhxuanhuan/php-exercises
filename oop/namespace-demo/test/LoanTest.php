<?php

declare(strict_types=1);

use App\Enums\LoanStatus;
use App\Models\Book;
use App\Models\Loan;
use App\Models\Member;
use PHPUnit\Framework\TestCase;

class LoanTest extends TestCase
{
    public function testBorrowingReducesCopies(): void
    {
        $book = new Book("Lão Hạc", 1);
        $member = new Member(1, "Huấn");

        $loan = new Loan($book, $member);

        $this->assertSame(0, $book->getAvailableCopies());
        $this->assertSame(LoanStatus::Borrowed, $loan->getStatus());
    }

    public function testCannotBorrowUnavailableBook(): void
    {
    $book = new Book("Lão Hạc", 0);
    $member = new Member(1, "Huấn");

    $this->expectException(\RuntimeException::class);

    new Loan($book, $member);
    }

    public function testReturningRestoresCopies(): void
    {
        $book = new Book("Lão Hạc", 1);
        $member = new Member(1, "Huấn");
        $loan = new Loan($book, $member);

        $loan->returnBook();

        $this->assertSame(1, $book->getAvailableCopies());
        $this->assertSame(LoanStatus::Returned, $loan->getStatus());
    }

    public function testCannotReturnSameLoanTwice(): void
    {
        $book = new Book("Lão Hạc", 1);
        $member = new Member(1, "Huấn");
        $loan = new Loan($book, $member);

        $loan->returnBook();

        try {
            $loan->returnBook();
        } catch (\RuntimeException $error) {
            $this->assertSame(1, $book->getAvailableCopies());
            $this->assertSame(LoanStatus::Returned, $loan->getStatus());
            return;
        }

        $this->fail("Trả lần hai phải phát sinh lỗi");
    }

    public function testCannotCreateBookWithNegativeCopies(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Book("Lão Hạc", -1);
    }
    
}