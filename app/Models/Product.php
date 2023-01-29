<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class,'product_tag','product_id','tag_id');
    }
}
