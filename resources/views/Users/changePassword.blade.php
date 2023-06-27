@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Change Password</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Change Password</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-2">
                <form action="{{route('UpdatePasswordUserList', ['id'=>$user -> id])}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="New Password" name="password" required autocomplete="new-password">
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
        
                    <div class="input-group mb-3">
                        <input id="password-confirm" type="password" class="form-control" placeholder="Retype password"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="text-right">
                        @if (Auth::user()->role == 'Admin')
                        <a href="{{ route('EditUserList', ['id' => $user->id]) }}" class="btn btn-outline-secondary mr-2" role="button">Cancel</a>
                        @else
                        <a href="{{ route('editProfile', ['id' => $user->id]) }}" class="btn btn-outline-secondary mr-2" role="button">Cancel</a>
                        @endif
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- main content here --}}

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection