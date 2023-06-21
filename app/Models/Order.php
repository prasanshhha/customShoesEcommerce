<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\CustomItem;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'location',
        'date',
        'contact',
        'total',
        'status',
        'payment_status',
        'payment_method'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function customItems()
    {
        return $this->hasMany(CustomItem::class);
    }
}
