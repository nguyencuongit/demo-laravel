<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "name",
        "code",
        "slug",
        "info",
        "describer",
        "image",
        "price",
        "featured",
        "state",
        "category_id",
    ];
    protected $hidden =[];
    public function category(){
        return $this->belongsTo(Category::class, "category_id", "id");
    }
}
