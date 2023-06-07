@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Mata Kuliah</h1>
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
            <div class="card-header text-right">
                <a href="#" class="btn btn-primary" role="button">Input Mata Kuliah</a>

            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead>
                    <tr>
                        <th>Kode Matkul</th>
                        <th>Nama Matkul</th>
                        <th>Semester</th>
                        <th>Beban SKS</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mata_kuliahs as $matakuliah)
                        <tr>
                            <td>{{$matakuliah -> kode_matkul}}</td>
                            <td>{{$matakuliah -> nama_matkul}}</td>
                            <td>{{$matakuliah -> semester}}</td>
                            <td>{{$matakuliah -> beban_sks}}</td>
                            <td>
                                <a href="#" class="btn btn-warning" role="button">Edit</a>
                                <a href="#" class="btn btn-danger" role="button">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-header text-right">
                <a href="{{route('mataKuliahDetailList')}}" class="btn btn-primary" role="button">Mata Kuliah Detail</a>
            </div>
        </div>
        {{-- main content here --}}

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
