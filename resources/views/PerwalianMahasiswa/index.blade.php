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
        @foreach (array("Senin", "Selasa", "Rabu", "Kamis", "Jumat") as $hari)
        <div class="card text-center bg-primary">
            <div class=""><h1>{{ $hari }}</h1></div>
            <div class="card-body p-0 bg-light">
                <table class="table table-hover mb-0">
                    <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Mata Kuliah</th>
                        <th>Kelas</th>
                        <th>Tipe</th>
                        <th>Kuota</th>
                        <th>Beban SKS</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Ruangan</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($MataKuliahMahasiswas as $matakuliahdetail)
                        <tr>
                            <td>{{$matakuliahdetail -> kode_matkul}}</td>
                            <td>{{$matakuliahdetail -> nama_matkul}}</td>
                            <td>{{$matakuliahdetail -> kelas}}</td>
                            <td>{{$matakuliahdetail -> tipe}}</td>
                            <td>{{$matakuliahdetail -> kuota}}</td>
                            <td>{{$matakuliahdetail -> beban_sks}}</td>
                            <td>{{$matakuliahdetail -> hari}}</td>
                            <td>{{$matakuliahdetail -> jam_awal}} - {{$matakuliahdetail -> jam_akhir}}</td>
                            <td>{{$matakuliahdetail -> kode_ruang}}</td>
                            <td>
                                <input type="checkbox" class="form-check-input">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
        {{-- main content here --}}

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
