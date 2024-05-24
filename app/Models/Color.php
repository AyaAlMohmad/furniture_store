<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends AppModel
{
    use Translatable;
    use HasFactory;
    protected $fillable = ['image'];

    public $translatedAttributes = ['name', 'locale'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'color_products');
    }
}
