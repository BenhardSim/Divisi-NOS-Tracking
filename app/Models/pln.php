<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pln extends Model
{
    protected $guarded = [];
    use HasFactory;
    public $timestamps = false;
    protected $dates = ['date'];
}
