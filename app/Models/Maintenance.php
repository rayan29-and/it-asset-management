<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aset;

class Maintenance extends Model
{
    protected $table = 'maintenance';

    protected $fillable = [
        'aset_id',
        'tanggal_masuk',
        'keluhan',
        'tindakan',
        'teknisi',
        'tanggal_selesai',
        'status',
        'keterangan',
    ];

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'aset_id');
    }
}