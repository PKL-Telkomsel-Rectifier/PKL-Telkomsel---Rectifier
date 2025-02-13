<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryRectifier extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    

    public function rectifier()
    {
        return $this->belongsTo(Rectifier::class);
    }
}
