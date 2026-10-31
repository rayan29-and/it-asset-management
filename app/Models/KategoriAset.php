<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aset;
use App\Models\User;

class KategoriAset extends Model
{
    protected $table = 'kategori_aset';

    protected $fillable = [
        'user_id',
        'nama_kategori',
        'keterangan',
    ];

    /**
     * Kategori ini dimiliki oleh satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Kategori memiliki banyak aset.
     */
    public function aset()
    {
        return $this->hasMany(Aset::class, 'kategori_id');
    }
}