<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Process extends Model
{
    protected $guarded = [];

    public function orders() {
        return $this->hasMany(HistoryOrders::class, 'orders_id', 'kode_pemesanan');
    }

    public function users() {
        return $this->hasOne(User::class, 'id', 'user_id', );
    }

    public function history_users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
