<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pbb extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'idPBB';
    }
}
