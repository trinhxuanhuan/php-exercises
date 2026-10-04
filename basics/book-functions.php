<?php

function cleanBookTitle($title)
{
    $cleanTitle = trim($title);

    if ($cleanTitle === "") {
        return "Lỗi! Tên sách không được để trống";
    }

    return $cleanTitle;
}