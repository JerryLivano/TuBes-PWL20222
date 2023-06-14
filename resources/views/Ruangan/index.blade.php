@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Ruangan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Ruangan</li>
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
                <a href="{{route('createRuangan')}}" class="btn btn-primary" role="button">Input Ruangan</a>

            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0 text-center">
                    <thead>
                    <tr>
                        <th>Kode Ruang</th>
                        <th>Nama Ruang</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ruangans as $ruangan)
                        <tr>
                            <td>{{$ruangan -> kode_ruang}}</td>
                            <td>{{$ruangan -> nama_ruang}}</td>
                            <td>
                                <a href="{{ route('editRuanganList', ['kode_ruang' => $ruangan->kode_ruang]) }}" class="btn btn-warning" role="button" style="cursor: pointer;" class="btn btn-warning" role="button">Edit</a>
                                <a href="{{ route('deleteRuanganList', ['kode_ruang' => $ruangan->kode_ruang]) }}" class="btn btn-danger" role="button">Delete</a>
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
