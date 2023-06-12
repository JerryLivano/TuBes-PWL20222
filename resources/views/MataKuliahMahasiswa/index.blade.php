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
                <table class="table table-hover mb-0 text-center">
                    <thead>
                    <tr>
                        <th>Kode Matkul</th>
                        <th>Nama Matkul</th>
                        <th>Semester</th>
                        <th>Beban SKS</th>
                        <th>Deskripsi</th>
                        <th>Kode Prodi</th>
                        <th>Action</th>
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
                                <td>
                                    <a href="#" class="btn btn-success" role="button">Detail</a>
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
@extends('layouts.master')
