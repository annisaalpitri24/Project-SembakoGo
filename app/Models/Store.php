<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'user_id',
        'nama_toko',
        'alamat_toko',
        'no_hp_toko',
        'deskripsi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->hasMany(\App\Models\Category::class);
    }

    public function products()
    {
        return $this->hasMany(\App\Models\Product::class);
    }
}
