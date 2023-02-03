<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontrak_site_history extends Model
{
    use HasFactory;
    public function siteprofile(){
        return $this->belongsTo(siteprofile::class);
    }
}
