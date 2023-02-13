<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentHistory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $dates = ['waktu'];
    protected $guarded = [];
}
