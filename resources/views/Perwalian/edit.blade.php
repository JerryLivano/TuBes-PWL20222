@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Perwalian Edit</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('mahasiswaList')}}">Mahasiswa</a></li>
                    <li class="breadcrumb-item"><a href="{{route('mataKuliahList')}}">Mata Kuliah</a></li>
                    <li class="breadcrumb-item"><a href="{{route('programStudiList')}}">Program Studi</a></li>
                    <li class="breadcrumb-item active">Perwalian Form</li>
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
                <form action="{{ route('updatePerwalian', ['id'=>$perwalian -> id]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="txtId">ID</label>
                        <input type="text" id="txtId" name="txtId" class="form-control" required placeholder="ID" readonly value="{{ $perwalian -> id }}">
                    </div>
                    <div class="form-group">
                        <label for="txtName">Semester</label>
                        <input type="text" id="txtName" name="txtName" class="form-control" required placeholder="Semester" value="{{ $perwalian -> semester }}">
                    </div>
                    <div class="text-right">
                        <a href="{{ route('perwalianList') }}" class="btn btn-outline-secondary mr-2" role="button">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection