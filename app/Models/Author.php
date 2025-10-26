<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $primaryKey = 'authorId';

    // Define the relationship with Book model
    public function books()
    {
        return $this->hasMany(Book::class, 'author_id');
    }
}
