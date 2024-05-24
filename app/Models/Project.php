<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends AppModel
{
    use Translatable;

    use HasFactory;

    protected $guarded = [];
    protected $translatedAttributes = ['title', 'description', 'locale'];
    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
