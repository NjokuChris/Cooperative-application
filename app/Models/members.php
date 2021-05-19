<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class members extends Model
{
    use HasFactory;

    protected $primaryKey = 'member_id';

    protected $fillable = [
        
        'member_no',
      'firstName',
       'middleName', 
      'surName', 
       'savings_amount',  
       'posted_date',  
       'LocationID',  
       'joined_date',  
       'H_address',  
       'email',  
       'phoneNo', 
       'is_staff',  
       'employee_no', 
       'company', 
       'date_birth',  
       'gender', 
       'Home_location', 
       'H_state', 
       'BankID',  
       'BankAcc_no',  
       'photo', 
     'posted_by', 
       'title',
        
    ];
}
