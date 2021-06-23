@extends('layouts.admin')


@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Cooperative Cash Receipts</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item">Cash Receipts</li>
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
                    <h3 class="card-title">Cash Receipts Form</h3>
                </div>
                <form method="post" action="{{ route('receipt.store') }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <!-- SELECT2 EXAMPLE -->
                    <div class="card-body">

                        <div class="row">
                            <div>
                                <div class="col-md-5">
                                    <div class="input-field form-group">
                                        <label class="bmd-label-floating">Members Name</label>
                                        <input type="text" id="autocomplete-input" class="autocomplete">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="col-md-2">
                                    <div class="">
                                        <label class="">code</label>
                                        <input type="text" id="member_id">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Amount Paid</label>
                                    <input type="text" class="form-control"  name="company_code">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Paid By</label>
                                    <input type="text" class="form-control"  name="company_code">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Method of Payment</label>
                                    <select class="form-control select2" style="width: 100%;" name="company">
                                        <option value="">Select Payment Method</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Receiving Account</label>
                                    <select class="form-control select2" style="width: 100%;" name="company">
                                        <option value="">Select Receiving Account</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Receipts Description</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter Receipts Description..." name="H_address"></textarea>
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
