<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kopi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function orders() {
        return $this->belongsTo(Order::class);
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
