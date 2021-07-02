<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;

     public function account_type()
    {
        return $this->hasMany(account_type::class);
    }

    public function account_class()
    {
        return $this->hasMany(account_class::class);
    }

    public function account_group()
    {
        return $this->hasMany(account_group::class);
    }
}
