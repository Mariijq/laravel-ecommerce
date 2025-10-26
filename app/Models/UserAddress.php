<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserAddress extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'email', 'phone', 'country', 'state', 'city', 'zip', 'address'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'userId'); 
    }

}
