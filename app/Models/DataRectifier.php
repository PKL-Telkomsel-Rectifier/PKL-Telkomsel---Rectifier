<?php

namespace App\Models;

use App\Models\Rectifier;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataRectifier extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    // METHOD 
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['start_date'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $search = Carbon::parse($search);
                $query->where('created_at', '>=', $search);
            });
        });

        $query->when($filters['end_date'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $search = Carbon::parse($search);
                $query->where('created_at', '<=', $search->addDay());
            });
        });
    }

    public function rectifier()
    {
        return $this->belongsTo(Rectifier::class);
    }
}
