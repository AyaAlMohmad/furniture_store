<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends AppModel
{
    use HasFactory;
    protected $fillable = ['role_name'];


    public function users()
    {
        return $this->belongsToMany(User::class, 'role_users');
    }
}
