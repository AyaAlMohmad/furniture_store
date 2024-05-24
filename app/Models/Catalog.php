<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends AppModel
{
    use Translatable;
    
    use HasFactory;
    
    protected $guarded = [];
    protected $translatedAttributes=['title','locale'];
}
