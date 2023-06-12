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
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead>
                    <tr>
                        <th>Kode Matkul</th>
                        <th>Nama Matkul</th>
                        <th>Semester</th>
                        <th>Beban SKS</th>
                        <th>Deskripsi</th>
                        <th>Kode Prodi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($MataKuliahMahasiswa as $matkul)
                            <tr data-toggle="dropdown">
                                <td>{{$matkul->kode_matkul}}</td>
                                <td>{{$matkul->nama_matkul}}</td>
                                <td>{{$matkul->semester}}</td>
                                <td>{{$matkul->beban_sks}}</td>
                                <td>{{$matkul->deskripsi}}</td>
                                <td>{{$matkul->kode_prodi}}</td>
                            </tr>
                           
                            <div class="dropdown-menu">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                            value="option1" checked>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Tipe</th>
                                                    <th>Kelas</th>
                                                    <th>Kuota</th>
                                                    <th>Hari</th>
                                                    <th>Jam Awal</th>
                                                    <th>Jam Akhir</th>
                                                    <th>Kode Matkul</th>
                                                    <th>Perwalian</th>
                                                    <th>Kode Ruang</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($MataKuliahMahasiswa as $matdet)
                                                    <td>{{$matdet->kode_matkul}}</td>
                                                    <td>{{$matdet->kelas}}</td>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <div>
                            
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
@extends('layouts.master')
