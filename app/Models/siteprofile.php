<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siteprofile extends Model
{
    use HasFactory;
    public function kontrak_site_histories(){
        return $this->hasMany(kontrak_site_history::class);
    }
}
