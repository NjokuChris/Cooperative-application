@extends('layouts.admin')

@section('css')

@endsection


@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Cooperative Loan Application</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
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
                <form method="post" action="{{ route('loans.store') }}" enctype="multipart/form-data">
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
                                        <input type="text" id="member_id" name="members_id">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Loan Type</label>
                                    <select class="form-control select2" style="width: 100%;" name="loan_type_id">
                                        <option value="">Select Loans Type</option>
                                        @foreach ($loans_type as $l)
                                            <option value="{{$l->id}}">{{$l->loans_type}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Loan Amount</label>
                                    <input type="text" class="form-control"  name="loanamount">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Tenor</label>
                                    <input type="text" class="form-control" name="tenor">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Interest Rate</label>
                                    <input type="text" class="form-control" placeholder="%" name="interest_rate">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Monthly Deduction</label>
                                    <input type="text" class="form-control" name="monthlydeduction">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Interest Amount</label>
                                    <input type="text" class="form-control" name="inerestamount">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Payment Start Month</label>
                                    <select class="form-control select2" style="width: 100%;" name="paystartperiod_id">
                                        <option value="">Select Payment Start Month</option>
                                        @foreach ($period as $p)
                                            <option value="{{$p->id}}">{{$p->period_description}}</option>

                                        @endforeach
                                    </select>
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

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: 'get',
                url: 'http://localhost:8000/findMembers',
                success: function(response) {
                    console.log(response);
                    var MembArray = response;
                    var dataMemb = {};
                    var dataMemb2 = {};
                    for (var i = 0; i < MembArray.length; i++) {
                        dataMemb[MembArray[i].member_name] = null;
                        dataMemb2[MembArray[i].member_name] = MembArray[i];
                    }
                    console.log("dataMemb2");
                    console.log(dataMemb2);
                    $('input#autocomplete-input').autocomplete({
                        data: dataMemb,
                        onAutocomplete: function(reqdata) {
                            console.log(reqdata);
                            $('#member_id').val(dataMemb2[reqdata]['member_id']);
                        }
                    });
                }
            })
        });
    </script>

@endpush
