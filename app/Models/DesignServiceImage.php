<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignServiceImage extends AppModel
{
    use HasFactory;
    protected $fillable = ['image', 'design_service_id'];
    public function DesignService()
    {
        return $this->belongsTo(DesignService::class);
    }
}
