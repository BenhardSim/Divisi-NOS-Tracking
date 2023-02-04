<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imbas_petir extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'idimbas';
    }
}
