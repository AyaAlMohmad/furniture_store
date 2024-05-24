<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryImage extends AppModel
{

    use HasFactory;
    protected $fillable = ['image', 'history_id'];
    public function history()
    {
        return $this->belongsTo(History::class);
    }
}
