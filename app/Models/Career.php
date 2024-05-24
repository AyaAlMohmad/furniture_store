<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends AppModel
{
    use Translatable;
    use HasFactory;
    protected $guarded = [];
    public $translatedAttributes = ['title','your_tasks','locale','carrer'];
    public function orderJob()
    {
        return $this->belongsToMany(OrderJob::class,'orderjob_careers');
    }
}

