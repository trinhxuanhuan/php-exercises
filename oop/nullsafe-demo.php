<?php
class Member{
    public function __construct(public string $name){

    }
}
$member = new Member("Nguyễn Văn A");
$name = $member ?-> name;
echo $name ?? "Chưa có thành viên";