<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class tracked_document extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $dates = ['tanggal'];
    protected $guarded = [];
}
