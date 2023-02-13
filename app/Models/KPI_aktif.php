<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KPI_aktif extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    use HasFactory;

    // METHOD 
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['interval_awal_in'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $search = Carbon::parse($search);
                $query->where('date', '>=', $search);
            });
        });

        $query->when($filters['interval_akhir_in'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $search = Carbon::parse($search);
                $query->where('date', '<=', $search->addDay());
            });
        });
    }
}
