<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receipts extends Model
{
    use HasFactory;

     public function pay_method()
    {
        return $this->belongsTo(Pay_method::class, 'method_pay');
    }

    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function Posted_by()
    {
        return $this->belongsTo(User::class, 'posted_by');
    }
}
