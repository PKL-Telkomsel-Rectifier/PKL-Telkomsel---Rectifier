<?php

namespace App\Models;

use App\Models\Rectifier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataRectifier extends Model
{
    use HasFactory;

    protected $guarded = ['id'];



    public function rectifier()
    {
        return $this->belongsTo(Rectifier::class);
    }
}
