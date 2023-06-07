@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Ruangan Edit</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('mahasiswaList')}}">Mahasiswa</a></li>
                    <li class="breadcrumb-item"><a href="{{route('mataKuliahList')}}">Mata Kuliah</a></li>
                    <li class="breadcrumb-item"><a href="{{route('ruanganList')}}">Ruangan</a></li>
                    <li class="breadcrumb-item active">Ruangan Form</li>
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
                <form action="{{ route('updateRuanganList', ['kode_ruang'=>$ruangan -> kode_ruang]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="txtId">Kode Ruang</label>
                        <input type="text" id="txtId" name="txtId" class="form-control" required placeholder="Kode Ruang" readonly value="{{ $ruangan -> kode_ruang }}">
                    </div>
                    <div class="form-group">
                        <label for="txtName">Nama Ruang</label>
                        <input type="text" id="txtName" name="txtName" class="form-control" required placeholder="Nama Ruang" value="{{ $ruangan -> nama_ruang }}">
                    </div>
                    <div class="text-right">
                        <a href="{{ route('ruanganList') }}" class="btn btn-outline-secondary mr-2" role="button">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection