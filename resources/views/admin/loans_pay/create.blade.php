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
                @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                <form method="post" action="{{ route('loans.store') }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <!-- SELECT2 EXAMPLE -->
                    <div class="card-body">

                        <div class="row">
                            <div>
                                <div class="col-md-5">
                                    <div class="input-field form-group">
                                        <label class="bmd-label-floating">Members Name</label>
                                        <input type="text" id="autocomplete-input" required class="autocomplete">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="col-md-1">
                                    <div class="">
                                        <label class="">code</label>
                                        <input type="text" readonly id="member_id" required name="members_id">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Loan Type</label>
                                    <select class="form-control select2" style="width: 100%;" required name="loan_type_id">
                                        <option value="">Select Loans Type</option>
                                        @foreach ($loans_type as $l)
                                            <option value="{{ $l->id }}">{{ $l->loans_type }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Loan Amount</label>
                                    <input type="text" id="amount" data-type="currency" placeholder="NGN1,000,000.00" value="" pattern="^\NGN\d{1,3}(,\d{3})*(\.\d+)?NGN" class="form-control" name="loan_amount" required>
                                    <input type="hidden" readonly id="amount1" name="amount1" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Tenor</label>
                                    <input type="number" id="tenor" class="form-control" required name="tenor">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Margin</label>
                                    <input type="number" id="interest_rate" class="form-control" placeholder="%" required name="interest_rate">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Monthly Deduction</label>
                                    <input type="number" id="monthly_deduction" class="form-control" name="monthlydeduction" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Interest Amount</label>
                                    <input type="number" id="interest_amount" class="form-control" name="interestamount" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Total Payable Amount</label>
                                    <input type="number" id="total_amount" class="form-control" readonly name="total_amount" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Payment Start Month</label>
                                    <select class="form-control select2" required style="width: 100%;" name="paystartperiod_id">
                                        <option value="">Select Payment Start Month</option>
                                        @foreach ($period as $p)
                                            <option value="{{ $p->period_id }}">{{ $p->period_description }}</option>
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
    <script src="{{ asset('js/Autocomplete.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('#amount').on('keyup change', function() {
                $('#amount1').val($('#amount').val().replace(/\D/g, ""));
                calc_total();
            });
            $('#tenor').on('keyup change', function() {
                calc_total();
            });
            $('#interest_rate').on('keyup change', function() {
                calc_total();
            });

            function calc_total() {

                amount = $('#amount').val();
                interest = parseFloat($('#interest_rate').val());
                amount1 =parseFloat(amount.replace(/\D/g, ""));

               // console.log(amount1)
                //console.log(amount)
                //console.log(parseFloat($('#amount').val().replace(/\D/g, "")))
                //console.log(interest_amount)
                //console.log(tenor)
                //console.log(interest)
                tenor = parseInt($('#tenor').val());

                interest_amount = amount1 / 100 * parseFloat($('#interest_rate').val());
                monthly_deduction = (amount1+interest_amount) / tenor
                total_amount = (interest_amount + amount1)


                $('#monthly_deduction').val(monthly_deduction);
                $('#interest_amount').val(interest_amount);
                $('#total_amount').val(total_amount);

                //console.log(formatNumber($('#total_amount').val());
               //tax_sum = total / 100 * $('#tax').val();
                //$('#tax_amount').val(tax_sum.toFixed(2));
                //$('#total_amount').val((tax_sum + total).toFixed(2));
            }


            $.ajax({
                type: 'get',
                url: "{{ url('findMembers') }}",
                success: function(response) {
                   // console.log(response);
                    var MembArray = response;
                    var dataMemb = {};
                    var dataMemb2 = {};
                    for (var i = 0; i < MembArray.length; i++) {
                        dataMemb[MembArray[i].member_name] = null;
                        dataMemb2[MembArray[i].member_name] = MembArray[i];
                    }
                   // console.log("dataMemb2");
                    //console.log(dataMemb2);
                    $('input#autocomplete-input').autocomplete({
                        data: dataMemb,
                        onAutocomplete: function(reqdata) {
                      //      console.log(reqdata);
                            $('#member_id').val(dataMemb2[reqdata]['member_id']);
                        }
                    });
                }
            })
        });
    </script>

@endpush
