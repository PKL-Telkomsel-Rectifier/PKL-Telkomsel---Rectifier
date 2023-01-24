<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rectifier extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // oid sysProcess = .1.3.6.1.2.1.25.1.6.0
    // oid memorySize = .1.3.6.1.2.1.25.2.2.0 

}
