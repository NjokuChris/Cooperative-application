<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    use HasFactory;

    public function loans_type()
    {
        return $this->belongsTo(loans_type::class, 'loan_type_id','salary_group_id');
    }

    public function period()
    {
        return $this->belongsTo(period::class);
    }

    public function loans_schedule()
    {
        return $this->hasMany(loans_schedule::class);
    }
    public function members()
    {
        return $this->hasOne(Members::class, 'member_id', 'member_id');
    }

    public function postedby()
    {
        return $this->belongsTo(User::class, 'posted_by');
    }
}
