@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Perwalian</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Mata Kuliah Detail</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                <tr>
                    <th>Tipe</th>
                    <th>Kuota</th>
                    <th>Beban SKS</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Kode Matkul</th>
                    <th>Kode Ruang</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($MataKuliahMahasiswas as $matakuliahdetail)
                    <tr>
                        <td>{{$matakuliahdetail -> tipe}}</td>
                        <td>{{$matakuliahdetail -> kuota}}</td>
                        <td>{{$matakuliahdetail -> beban_sks}}</td>
                        <td>{{$matakuliahdetail -> hari}}</td>
                        <td>{{$matakuliahdetail -> jam}}</td>
                        <td>{{$matakuliahdetail -> kode_matkul}}</td>
                        <td>{{$matakuliahdetail -> kode_ruang}}</td>
                        <td>
                            <a href="#" class="btn btn-warning" role="button">Edit</a>
                            <a href="#" class="btn btn-danger" role="button">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
        {{-- main content here --}}

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
