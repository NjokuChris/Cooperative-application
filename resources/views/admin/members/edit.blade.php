@extends('layouts.admin')

@section('content')
  
   <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Member Detail</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home')}}">Home</a></li>
              <li class="breadcrumb-item">Edit Member Detail</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form method="POST"action="{{route('members.update', $member->member_id)}}">
                {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                   <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                   <div class="row">
                        <div class="col-sm-6 col-sm-offset-1">
                            <div style="position: relative; cursor: pointer; text-align: center;">
                                <div style="width: 106px; height: 106px;
                                              background-color: #999999;
                                              border: 4px solid #CCCCCC;
                                              color: #FFFFFF;
                                              border-radius: 50%;
                                              margin: 5px auto;
                                              overflow: hidden;
                                              transition: all 0.2s;">
                                    
                                    <input type="file" name="photo" id="wizard-picture" style="cursor: pointer;
                                                    display: block;
                                                    height: 100%;
                                                    left: 0;
                                                    opacity: 0 !important;
                                                    position: absolute;
                                                    top: 0;
                                                    width: 100%;">
                                                    @if($member->photo) 
                                                      <img src="{{ asset('storage/photo/'.$member->photo) }}" style="width: 100%;" id="wizardPicturePreview" title="" />

                                                    @endif
                                </div>
                                
                                <h6>Choose Picture</h6>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Title</label>
                                <select class="form-control select2" name="title" style="width: 100%;"
                                value="{{$member->title}}">
                                    <option selected="selected">Mr.</option>
                                    <option>Mrs</option>
                                    <option>Miss</option>
                                    <option>Dr.</option>
                                    <option>PhD</option>
                                    <option>Mallam</option>
                                    <option>Prof.</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Fist Name</label>
                                <input type="text" class="form-control" name="firstname" value="{{$member->firstname}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Sur Name</label>
                                <input type="text" class="form-control" name="surName" value="{{$member->surName}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Other Names</label>
                                <input type="text" class="form-control" name="middleName" value="{{$member->middleName}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Company</label>
                                <select class="form-control select2" style="width: 100%;" name="company" value="{{$member->company}}">
                                    <option selected="selected">Media Trust</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">employee No.</label>
                                <input type="text" class="form-control" name="employee_no" value="{{$member->employee_no}}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Saving Amount</label>
                                <input type="text" class="form-control" name="savings_amount" value="{{$member->savings_amount}}">
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Branch Location:</label>
                                <select class="form-control select2" name="Location" value="{{$member->Location}}">
                                    <option value="1" selected>Abuja</option>
                                    <option value="2">Lagos</option>
                                    <option value="2">Kano</option>
                                    <option value="2">Kaduna</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Phone Number </label>
                                <input type="text" class="form-control" name="phoneNo" value="{{$member->phoneNo}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Email address</label>
                                <input type="email" class="form-control" name="email" value="{{$member->email}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Location</label>
                                <input type="text" class="form-control" name="Home_location" value="{{$member->Home_location}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Gender:</label>
                                <select class="form-control select2" name="gender" value="{{$member->gender}}">
                                    <option value="1" selected>Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Date of Birth:</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="date_birth" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{$member->date_birth}}" />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Address.</label>
                                <textarea class="form-control" rows="3" placeholder="Enter Address..." name="H_address" value="{{$member->H_address}}"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Date Joined:</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="joined_date" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{$member->joined_date}}" />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">
                            <label class="bmd-label-floating">Membership Charges</label>
                            &nbsp;&nbsp;&nbsp; Yes <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" value="yes" id="yesCheck" <?php echo ($member=='yes')?'checked':'' ?>> 
                                                No <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" value="no" id="noCheck" <?php echo ($member=='no')?'checked':'' ?>><br>
                            <div id="ifYes" style="visibility:hidden">
                                Charge Amount <input type='text' id='yes' name='yes'><br>

                            </div>


                            <!-- checkbox 
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">

                                <label for="customCheckbox1" class="custom-control-label">Membership Charges</label> 
                            
                            Membership Charges: <input type="checkbox" id="myCheck" onclick="myFunction()">


                            <input id="text" type="text" class="form-control" style="display:none">
                            </div>
                        </div> -->
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Bank:</label>
                                <select class="form-control select2" name="BankID" value="{{$member->BankID}}">
                                    <option value="1" selected>GTBank</option>
                                    <option value="2">First Bank</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Account Number</label>
                                <input type="text" class="form-control" name="BankAcc_no" value="{{$member->BankAcc_no}}">
                            </div>
                        </div>
                    
                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>


                </div>
        </div>

        </form>
    </div>


    </div>
</section>
@endsection