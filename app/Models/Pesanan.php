<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function kendaraan()
    {
        return $this->hasOne(Kendaraan::class, 'id', 'id_kendaraan');
    }
}
