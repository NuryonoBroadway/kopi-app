<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryOrders extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function process() {
        return $this->belongsTo(Process::class, 'orders_id', 'kode_pemesanan');
    }
}
