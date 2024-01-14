<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'tb_peminjaman';

    protected $primaryKey = 'PID';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'PID', 'TID', 'DVDID', 'tgl_peminjaman', 'tgl_pengembalian',
    ];
}
