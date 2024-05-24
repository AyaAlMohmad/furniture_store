<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends AppModel
{
    use Translatable;

    use HasFactory;

    protected $guarded = [];

    protected $translatedAttributes = ['name', 'material', 'description', 'locale'];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function designer()
    {
        return $this->belongsTo(Designer::class);
    }
    public function images()
    {
        return $this->hasMany(ImageProduct::class);
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_products');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'orders');
    }
}
