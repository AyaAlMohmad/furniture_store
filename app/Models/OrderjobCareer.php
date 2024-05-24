<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderjobCareer extends AppModel
{
    use HasFactory;
    protected $guarded = [];
    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    public function orderJob()
    {
        return $this->belongsTo(OrderJob::class);
    }
}
