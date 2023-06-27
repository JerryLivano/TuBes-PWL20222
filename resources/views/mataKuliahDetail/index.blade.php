@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Mata Kuliah Detail</h1>
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
        <div class="card">
            <div class="card-header text-right">
                <a href="{{route('createMataKuliahDetail')}}" class="btn btn-primary" role="button">Input Mata Kuliah Detail</a>

            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0 text-center">
                    <thead>
                    <tr>
                        <th>Tipe</th>
                        <th>Kelas</th>
                        <th>Kuota</th>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Perwalian</th>
                        <th>Kelas</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($matakuliahdetails as $matakuliahdetail)
                        <tr>
                            <td>{{$matakuliahdetail -> tipe}}</td>
                            <td>{{$matakuliahdetail -> kelas}}</td>
                            <td>{{$matakuliahdetail -> kuota}}</td>
                            <td>{{$matakuliahdetail -> hari}}</td>
                            <td>{{$matakuliahdetail -> jam_awal}} - {{$matakuliahdetail -> jam_akhir}}</td>
                            <td>{{$matakuliahdetail -> semester}}</td>
                            <td>{{$matakuliahdetail -> kode_ruang}}</td>
                            <td>
                                <a href="{{route('editMataKuliahDetail', ['kode_matkul' => $matkul_detail->kode_matkul]) }}" class="btn btn-warning" role="button">Edit</a>
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
