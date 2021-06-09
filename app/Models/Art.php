<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id',
    ];


    public function categories()
    {
        return $this->belongsToMany(Category::class, "artcategories");
    }

    public function images()
    {
        return $this->hasMany(Image::class, "art_id");
    }






    public function artCategoriesInArray()
    {

        $arr = [];

        foreach ($this->categories as $category) {
            $arr[] = $category->name;
        }
        return $arr;
    }
}
