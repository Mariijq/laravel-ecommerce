<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'categoryId';
    protected $fillable = ['name'];


    public function books()
    {
        return $this->hasMany(Book::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            $category->decrementCategoryIds($category->categoryId);
        });
    }

    public function decrementCategoryIds($deletedCategoryId)
    {
        self::where('categoryId', '>', $deletedCategoryId)->orderBy('categoryId', 'asc')->get()->each(function ($category) {
            $category->update(['categoryId' => $category->categoryId - 1]);
        });
    }


}
