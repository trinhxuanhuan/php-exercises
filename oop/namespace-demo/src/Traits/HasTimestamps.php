<?php

declare(strict_types=1);

namespace App\Traits;

trait HasTimestamps
{
    private string $createdAt;

    private function initializeTimestamp(): void
    {
        $this->createdAt = date("Y-m-d H:i:s");
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
}