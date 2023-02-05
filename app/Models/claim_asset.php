<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class claim_asset extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [''];

    public function getRouteKeyName()
    {
        return 'idclaim';
    }
}
