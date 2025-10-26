<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $primaryKey = 'orderDeatilsId';
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id'); // Specify the foreign key name
    }

}