<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberedDocument extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    use HasFactory;
    protected $dates = ['tanggal'];
}
