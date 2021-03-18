<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kopi_id',
        'name_product',
        'quantity',
        'total',
        'original_price'
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function orders_user() {
        return $this->hasMany(Order_User::class);
    }

    public function kodeOrders() {
        return $this->belongsTo(Orders_kode::class, 'orders_id', 'kode_pemesanan');
    }

}
