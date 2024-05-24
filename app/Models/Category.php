<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends AppModel
{
    use Translatable;
    use HasFactory;

    protected $guarded = [];
 
    public $translatedAttributes = ['name', 'description','locale'];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
