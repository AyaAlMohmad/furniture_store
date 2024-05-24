<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValueImage extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'value_id'];
    public function value()
    {
        return $this->belongsTo(Value::class);
    }
}
