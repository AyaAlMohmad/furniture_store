<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderJob extends AppModel
{
    use HasFactory;
    protected $guarded = [];
    public function careers()
    {
        return $this->belongsToMany(Career::class, 'orderjob_careers');
    }
}
