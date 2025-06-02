<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi secara massal (mass assignable)
    protected $fillable = [
        'user_id',
        'order_number',
        'total_amount',
        'shipping_cost', 
        'status',
        'payment_method',
        'payment_status',
        'shipping_address',
        'shipping_address_detail', 
        'recipient_name',          
        'recipient_phone',         
        
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke OrderItem
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}