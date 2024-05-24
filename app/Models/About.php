<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends AppModel
{
    use Translatable;
    use HasFactory;
    protected $fillable =['image'];
    public $translatedAttributes = ['title','locale','short_description','description'];
}
