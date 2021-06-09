<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'art_id',
        "category_id"

    ];

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
    // public function art()
    // {
    //     return $this->belongsTo(Art::class);
    // }



}
