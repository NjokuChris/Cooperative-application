@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Search Cash Deposit Report.</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item">Cash Deposit</li>
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
                    <h3 class="card-title">Cooperative Cash Deposit Report Search Form</h3>
                </div>
                <form method="post" action="{{ route('deposit_report')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @method('GET')
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Member Name </label>
                                    <input type="text" class="form-control" name="member_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Member Number</label>
                                    <input type="text" class="form-control" name="member_no">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Savings Amount (Greater Than)</label>
                                    <input type="text" class="form-control" name="savings_amount">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Branch Location:</label>
                                    <select class="form-control select2" name="LocationID">
                                        <option value="">Select Branch</option>
                                        @foreach ($branch as $b)
                                            <option value="{{$b->id}}">{{$b->branch}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Gender</label>
                                    <select class="form-control select2" name="gender">
                                        <option value="" selected>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bank:</label>
                                    <select class="form-control select2" name="BankID">
                                        <option value="">Select Bank</option>
                                        @foreach ($bank as $b)
                                            <option value="{{$b->id}}">{{$b->account_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Date Joined From</label>
                                    <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                        <input type="text" name="date_from" class="form-control datetimepicker-input" data-target="#reservationdate1" />
                                        <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Date Joined To</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" name="date_to" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <input type="submit" class="btn btn-info" value="Search Report">
                        </div>


                    </div>


                </form>
            </div>


        </div>
    </section>
@endsection
