@extends('layouts.admin')



@section('content')
   <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cooperative Members</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home')}}">Home</a></li>
              <li class="breadcrumb-item">Members</li>
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
                <a href="{{route('members.create')}}" class="btn btn-primary">New Member Registration</a>
                </p>

                <table class="table table-bordered table-striped" id="myTable">
                    <tr>
                        <th>Member ID</th>
                        <th>Title</th>
                        <th>Name</th>
                        <th>Branch</th>
                        <th>Monthly Savings.</th>
                        <th>Date Joined</th>
                        <th>Action</th>
                    </tr>
                    @foreach($members as $m)
                    <tr>
                        <td>{{$m->member_id}}</td>
                        <td>{{$m->title}}</td>
                        <td>{{$m->member_name}}</td>
                        <td>{{$m->branch_location->branch}}</td>
                        <td>{{$m->savings_amount}}</td>
                        <td>{{$m->joined_date}}</td>
                        <td><a href="{{route('members.edit',$m->member_id) }}" class="btn btn-info">Edit</a>  <a href="#" class="btn btn-danger">Terminate</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </section>
    @endsection


