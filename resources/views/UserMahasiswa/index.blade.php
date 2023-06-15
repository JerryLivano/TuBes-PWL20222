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
                <form method="post">
                    @csrf
                    <div class="form-group">
                        <label for="txtId">NRP</label>
                        <input type="text" id="txtId" name="txtId" class="form-control" required placeholder="Kode Prodi" readonly value="{{ $UserMahasiswa[0] -> id }}">
                    </div>
                    <div class="form-group">
                        <label for="txtName">Nama Lengkap</label>
                        <input type="text" id="txtName" name="txtName" class="form-control" required placeholder="" readonly value="{{ $UserMahasiswa[0] -> name }}">
                    </div>
                    <div class="form-group">
                        <label for="txtName">Email</label>
                        <input type="text" id="txtName" name="txtName" class="form-control" required placeholder="" readonly value="{{ $UserMahasiswa[0] -> email }}">
                    </div>
                    <div class="form-group">
                        <label for="txtName">Alamat</label>
                        <input type="text" id="txtName" name="txtName" class="form-control" required placeholder="" readonly value="{{ $UserMahasiswa[0] -> alamat }}">
                    </div>
                    <div class="form-group">
                        <label for="txtName">Gender</label>
                        <input type="text" id="txtName" name="txtName" class="form-control" required placeholder="" readonly value="{{ $UserMahasiswa[0] -> gender  }}">
                    </div>
                    <div class="form-group">
                        <label for="txtName">Tanggal Lahir</label>
                        <input type="text" id="txtName" name="txtName" class="form-control" required placeholder="" readonly value="{{ $UserMahasiswa[0] -> tanggal_lahir }}">
                    </div>
                   
                    <div class="text-right">
                        {{-- <a href="{{ route('updateUser') }}" class="btn btn-outline-secondary mr-2" role="button">Edit</a> --}}
                        <a href="{{ route('editUser',  ['id' => $UserMahasiswa[0]->id])}}" class="btn btn-warning" role="button" style="cursor: pointer;"><i class="nav-icon fa fa-edit"></i> Edit</a>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
