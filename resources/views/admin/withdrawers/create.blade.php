@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Loan Application</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item">Loan Application</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Loan Application Form</h3>
            </div>
            <form method="post" action="{{route('loans.store')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <!-- SELECT2 EXAMPLE -->
                <div class="card-body">

                        <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="bmd-label-floating">Members Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Loan Type</label>
                                <select class="form-control select2" style="width: 100%;" name="loan_type_id">
                                    <option selected="selected">Select Loan Type</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="bmd-label-floating">Loan Amount</label>
                                <input type="text" class="form-control" name="loanamount">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="bmd-label-floating">interestrate</label>
                                <input type="text" class="form-control" name="interest_rate">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Loan Tenor</label>
                                <select class="form-control select2" style="width: 100%;" name="tenor">
                                    <option selected="selected">Select Loan Tenor</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-5">
                            <label>Payment Start Date:</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="paystartperiod_id" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        </div>




                    <div class="form-group">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>


                </div>


            </form>
        </div>


    </div>
</section>
@endsection
