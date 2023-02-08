<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificate_document extends Model
{
    public $timestamps = false;
    protected $guarded = [''];
    use HasFactory;
    public function getRouteKeyName()
    {
        return 'no_ser';
    }
}
