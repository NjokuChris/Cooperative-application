<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
           
           $table->increments('member_id'); 
           $table->string('member_no'); 
           $table->string('firstName'); 
           $table->string('middleName')->nullable();; 
           $table->string('surName');  
           $table->double('savings_amount'); 
           $table->timestamp('posted_date'); 
           $table->double('LocationID');
           $table->timestamp('joined_date'); 
           $table->longText('H_address')->nullable();; 
           $table->string('email'); 
           $table->string('phoneNo'); 
           $table->boolean('is_staff'); 
           $table->string('employee_no')->nullable();; 
           $table->string('company'); 
           $table->timestamp('date_birth');
           $table->string('gender'); 
           $table->string('Home_location'); 
           $table->string('H_state'); 
           $table->double('BankID'); 
           $table->string('BankAcc_no'); 
           $table->string('sort_code');
           $table->string('photo')->nullable();; 
           $table->string('posted_by'); 
           $table->string('member_status'); 
           $table->string('sub_acc_code')->nullable();;
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
