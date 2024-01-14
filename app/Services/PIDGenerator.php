<?php

namespace App\Services;

class PIDGenerator
{
    public static function generateId($lastId)
    {
        $number = 1;
        if ($lastId) {
            $number = intval(substr($lastId, 1)) + 1;
        }
        
        return 'P' . str_pad($number, 5, '0', STR_PAD_LEFT);
    }
}