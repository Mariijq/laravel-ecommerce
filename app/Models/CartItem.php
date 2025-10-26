<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id', 'name', 'quantity', 'price'];

    protected $casts = [
        'user_id' => 'integer',
        'book_id' => 'integer',
        'name' => 'string',
        'quantity' => 'integer',
        'price' => 'decimal:2', // Specify precision and scale for the price
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'ISBN');
    }
}