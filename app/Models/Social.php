<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends AppModel
{
    use Translatable;
    use HasFactory;
    protected $fillable = ['type', 'link', 'image'];
    protected $translatedAttributes = ['title', 'locale'];
}
