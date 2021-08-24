@extends('layouts.admin')


@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Cooperative Loans Record</h1>
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
            <p>
                <a href="{{url()->previous()}}" class="btn btn-primary">Back to Loans</a>
                </p>
            <div class="row">
                <div class="col-md-10">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Loan Application Records</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">

                            <tr>
                              <th>Loans ID:</th>
                              <td>{{$loans->id}}</td>
                              <th>Loans Date:</th>
                              <td>{{$loans->created_at}}</td>
                            </tr>
                            <tr>
                              <th>Member Name</th>
                              <td>{{$loans->member->member_name}}</td>
                              <th>Tenor</th>
                              <td>{{$loans->tenor}}</td>
                            </tr>
                            <tr>
                              <th>Loan Amount:</th>
                              <td>{{number_format($loans->loanamount)}}</td>
                              <th>Margin:</th>
                              <td>{{$loans->interest_rate}}</td>
                            </tr>
                            <tr>

                              <th>Margin Amount:</th>
                              <td>{{number_format($loans->loanamount)}}</td>
                              <th>Total Amount Payable:</th>
                              <td>{{number_format($loans->total_payable_amount)}}</td>
                            </tr>

                      </table>
                    </div>
                    <!-- /.card-body -->

                  </div>
                  <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>

            <div class="row">
                <div class="col-md-8">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Loan Schedule Records</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 10px">ID</th>
                            <th>Period Description</th>
                            <th>Monthly Deduction</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach($loans_schedule as $l)
                            <tr>
                                <td>{{$l->payroll_id}}</td>
                                <td>{{$l->period_description}}</td>
                                <td>{{number_format($l->amount2debit)}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->

                  </div>
                  <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>

        </div>
    </section>
@endsection
