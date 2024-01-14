<?php

namespace App\Services;

class TIDGenerator
{
    public static function generateId($lastId)
    {
        $number = 1;
        if ($lastId) {
            $number = intval(substr($lastId, 1)) + 1;
        }
        
        return 'T' . str_pad($number, 5, '0', STR_PAD_LEFT);
    }
}