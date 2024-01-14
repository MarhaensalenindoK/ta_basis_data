<?php

namespace App\Services;

class DVDIDGenerator
{
    public static function generateId($lastId)
    {
        $number = 1;
        if ($lastId) {
            $number = intval(substr($lastId, 3)) + 1;
        }

        return 'DVD' . str_pad($number, 5, '0', STR_PAD_LEFT);
    }
}