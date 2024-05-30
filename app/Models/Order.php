<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'total_amount', 'payment_method', 'bank_name', 'beneficiary_name', 'swift_code'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
}