<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dvd extends Model
{
    use HasFactory;

    protected $table = 'tb_dvd';

    protected $primaryKey = 'DVDID';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'DVDID', 'judul', 'nama_pemeran'
    ];
}
