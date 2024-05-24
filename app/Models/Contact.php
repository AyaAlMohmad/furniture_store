<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends AppModel
{
    use HasFactory;
    
    protected $fillable = ['location', 'email', 'website', 'phone'];
}
