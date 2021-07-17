@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="/admin/roles/{{ $role->id }}">
                        @method('PATCH')
                        @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-5">
                                    <input id="name" type="text" id="name" class="form-control" name="name" value="{{$role->name }}">

                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('Role slug') }}</label>

                            <div class="col-md-6">
                                <input id="slug" type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $role->slug }}" required autocomplete="f_name" autofocus>

                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="s_name" class="col-md-4 col-form-label text-md-right">{{ __('Add Permissions') }}</label>

                            <div class="col-md-6">
                                <input id="role_permissions" id="role_permissions" type="text" class="form-control @error('role_permissions') is-invalid @enderror" name="role_permissions" value="@foreach ($role->permissions as $permission)
                                    {{$permission->name.","}}
                                @endforeach">


                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


