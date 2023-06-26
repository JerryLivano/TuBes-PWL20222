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
            <div class="card-body p-2">
                <form action="{{ route('updateProfile', ['id'=>$UserMahasiswa -> id]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="txtId">NRP</label>
                        <input type="text" id="txtId" name="txtId" class="form-control" required placeholder="Kode Prodi" readonly value="{{ $UserMahasiswa -> id }}">
                    </div>
                    <div class="form-group">
                        <label for="txtName">Nama Lengkap</label>
                        <input type="text" id="txtName" name="txtName" class="form-control" required placeholder="" value="{{ $UserMahasiswa -> name }}">
                    </div>
                    <div class="form-group">
                        <label for="txtEmail">Email</label>
                        <input type="text" id="txtEmail" name="txtEmail" class="form-control" required placeholder="" value="{{ $UserMahasiswa -> email }}">
                    </div>
                    <div class="form-group">
                        <label for="txtAlamat">Alamat</label>
                        <input type="text" id="txtAlamat" name="txtAlamat" class="form-control" required placeholder="" value="{{ $UserMahasiswa -> alamat }}">
                    </div>
                    <div class="form-group">
                        <label for="txtGender">Gender</label>
                        <input type="text" id="txtGender" name="txtGender" class="form-control" required placeholder="" value="{{ $UserMahasiswa -> gender  }}">
                    </div>
                    <div class="form-group">
                        <label for="txtLahir">Tanggal Lahir</label>
                        <input type="date" id="txtLahir" name="txtLahir" class="form-control"  placeholder="" value="{{ $UserMahasiswa -> tanggal_lahir }}">
                    </div>
                    <div class="form-group">
                        <label for="profile">Profile Sekarang</label><br>
                        @if(Auth::user()->profile == NULL)
                        <img src="{{asset('img/user-photo-default.png')}}" class="img-circle" alt="User Image" width="300">
                        @else
                        <img src="{{asset('img/'. Auth::user()->profile)}}" class="img-circle" alt="User Image" width="300">
                        @endif
                        <div class="mt-4">
                            <input id="profile" type="file" class="file @error('profile') is-invalid @enderror" placeholder="Foto Profil" name="profile"  value="{{ old('profile') }}" accept="image/*" autofocus>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('profile')}}" class="btn btn-danger" role="button" style="cursor: pointer;"><i class="fa fa-times"></i> Cancel</a>
                        <button type="submit" class="btn btn-primary" style="cursor: pointer;"><i class="fa fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
