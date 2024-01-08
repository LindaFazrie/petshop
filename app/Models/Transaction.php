<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_id',
        'status',
        'cart_items', // Add this line to include the cart_items field
        'total_price', // Add this line to include the total_price field
    ];

    // Add any additional relationships or methods as needed
}
