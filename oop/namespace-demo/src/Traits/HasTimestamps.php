<?php
declare(strict_types=1);
namespace App\Traits;
trait HasTimestamps{
    private string $createAt;
    private function initializeTimestamp():void{
        $this->createAt =date('Y-m-d H:i:s');
    }
    public function getCreateAt():string{
        return $this->createAt;
    }
}