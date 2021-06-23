<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loans extends Model
{
    use HasFactory;

    public function loans_type()
    {
        return $this->belongsTo(loans_type::class);
    }

    public function period()
    {
        return $this->belongsTo(period::class);
    }
}
