<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch_location extends Model
{
    use HasFactory;

    public function members()
    {
       return $this->hasMany('App\Models\members');

    }
}
