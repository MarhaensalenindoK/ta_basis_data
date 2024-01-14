<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teman extends Model
{
    use HasFactory;

    protected $table = 'tb_teman';

    protected $primaryKey = 'TID';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'TID', 'nama', 'alamat', 'telepon', 'email'
    ];
}
