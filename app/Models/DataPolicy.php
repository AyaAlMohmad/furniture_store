<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPolicy extends AppModel
{
    use Translatable;
    use HasFactory;
    protected $guarded = [];
    public $translatedAttributes = ['title', 'locale', 'description'];
}
