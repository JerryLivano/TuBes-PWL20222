@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('programStudiList')}}">Program Studi</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
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
                <form action="{{route('UpdateUserList', ['id'=>$user -> id])}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="id">ID</label>
                        <input id="id" type="text" class="form-control" required placeholder="ID" name="id" readonly value="{{ $user -> id }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input id="name" type="text" class="form-control" required placeholder="Full name" name="name" value="{{ $user -> name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" required name="email" value="{{ $user -> email }}" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" required placeholder="Password" name="password" value="{{ $user -> password }}">
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select id="role" type="text" class="form-control" required placeholder="Role" name="role" value="{{ $user -> role }}">
                            <option value="" disabled>Select Role</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="Program Studi">Program Studi</option>
                        </select>
                    </div>

                    <div class="text-right">
                        <a href="{{ route('userList') }}" class="btn btn-outline-secondary mr-2" role="button">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection