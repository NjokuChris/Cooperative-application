@extends('layouts.admin')

@section('content')
    <div class="card">
    <div class="card-header">
        <h3> Name: {{$user->name}}</h3>
        <h4> Name: {{$user->email}}</h4>
    </div>
    <div class="card-body">
        <h5 class="card-title">Role</h5>
        <p class="card-text">
            ................
        </p>
        <h5 class="card-title">Permission</h5>
        <p class="card-text">
            ................
        </p>
    </div>
    <div class="card-footer">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>
    </div>

    </div>

@endsection
