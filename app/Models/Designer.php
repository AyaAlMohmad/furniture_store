<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designer extends AppModel
{

    use Translatable;
    use HasFactory;
    protected $fillable = ['name', 'image'];
    public $translatedAttributes =  ['description', 'locale'];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
