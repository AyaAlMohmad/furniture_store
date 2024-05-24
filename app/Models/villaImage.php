<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class villaImage extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['image', 'villa_id'];
    public function villa()
    {
        return $this->belongsTo(Villa::class);
    }
}
