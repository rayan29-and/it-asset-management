<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\KategoriAset;
use App\Models\Maintenance;
use App\Models\User;

class Aset extends Model
{
    protected $table = 'aset';

    protected $fillable = [
        'user_id',
        'kode_aset',
        'nama_aset',
        'kategori_id',
        'merk',
        'model',
        'nomor_seri',
        'pengguna',
        'lokasi',
        'tanggal_perolehan',
        'kondisi',
        'status',
        'keterangan',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori()
    {
        return $this->belongsTo(
            KategoriAset::class,
            'kategori_id'
        );
    }

    public function maintenance()
    {
        return $this->hasMany(
            Maintenance::class,
            'aset_id'
        );
    }
}