@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Account</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item">Create Account</li>
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
                    <h3 class="card-title">Account Creation Form</h3>
                </div>
                <form method="post" action="{{ route('accounts.store') }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <!-- SELECT2 EXAMPLE -->
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Account Name </label>
                                    <input type="text" class="form-control" name="company_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Account Code</label>
                                    <input type="text" class="form-control" name="company_code">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Account Type</label>
                                    <select class="form-control select2" style="width: 100%;" name="company">
                                        <option value="">Select Acc Type</option>
                                        @foreach ($account_type as $a)
                                            <option value="{{$a->id}}">{{$a->account_type}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Account Group</label>
                                    <select class="form-control select2" style="width: 100%;" name="company">
                                        <option value="">Select Acc Group</option>
                                        @foreach ($account_group as $ag)
                                            <option value="{{$ag->id}}">{{$ag->account_type}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Account Type</label>
                                <select class="form-control select2" style="width: 100%;" name="company">
                                    <option value="">Select Acc Type</option>
                                    @foreach ($account_type as $a)
                                        <option value="{{$a->id}}">{{$a->account_type}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="bmd-label-floating">Status</label>
                            &nbsp;&nbsp;&nbsp; Active <input type="radio" name="Active" id="yesCheck"> In-Active <input type="radio" name="In-Active"><br>
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
