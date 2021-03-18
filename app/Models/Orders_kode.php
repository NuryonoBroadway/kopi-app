<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders_kode extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orders() {
        return $this->hasMany(Order::class, 'orders_id', 'kode_pemesanan');
    }

    public function users() {
        return $this->hasOne(User::class, 'id', 'user_id', );
    }
}

