@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Mata Kuliah</li>
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
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Foto Profil</h2>
                        @if(Auth::user()->profile == NULL)
                        <img src="{{asset('img/user-photo-default.png')}}" class="img-circle" alt="User Image" width="450">
                        @else
                        <img src="{{asset('img/'. Auth::user()->profile)}}" class="img-circle" alt="User Image">
                        @endif
                    </div>
                    @csrf
                    <div class="col-sm-7 mt-5">
                        <div class="form-group mb-4">
                            <label for="txtId">NRP</label>
                            <h5 id="txtId" name="txtId">{{ $UserMahasiswa[0] -> id }}</h5>
                        </div>
                        <div class="form-group mb-4">
                            <label for="txtName">Nama Lengkap</label>
                            <h5 id="txtName" name="txtName">{{ $UserMahasiswa[0] -> name }}</h5>
                        </div>
                        <div class="form-group mb-4">
                            <label for="txtEmail">Email</label>
                            <h5 id="txtEmail" name="txtEmail">{{ $UserMahasiswa[0] -> email }}</h5>
                        </div>
                        <div class="form-group mb-4">
                            <label for="txtName">Alamat</label>
                            <h5 id="txtName" name="txtName">{{ $UserMahasiswa[0] -> alamat }}</h5>
                        </div>
                        <div class="form-group mb-4">
                            <label for="txtName">Gender</label>
                            <h5 id="txtName" name="txtName">{{ $UserMahasiswa[0] -> gender }}</h5>
                        </div>
                        <div class="form-group mb-4">
                            <label for="txtName">Tanggal Lahir</label>
                            <h5 id="txtName" name="txtName">{{ $UserMahasiswa[0] -> tanggal_lahir }}</h5>
                        </div>
                    
                        <div class="text-right">
                            <a href="{{ route('editProfile',  ['id' => $UserMahasiswa[0]->id])}}" class="btn btn-warning" role="button" style="cursor: pointer;"><i class="nav-icon fa fa-edit"></i> Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
