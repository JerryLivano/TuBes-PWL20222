@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Mahasiswa</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Mahasiswa</li>
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
                    <a href="{{ route('createMahasiswa') }}" class="btn btn-primary" role="button">Input Mahasiswa</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>NRP</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Gender</th>
                            <th>Tanggal Lahir</th>
                            <th>Profile</th>
                            <th>Kode Prodi</th>
                            <th>ID User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswas as $mahasiswa )
                            <tr>
                                <td>{{$mahasiswa->nrp}}</td>
                                <td>{{$mahasiswa->nama}}</td>
                                <td>{{$mahasiswa->alamat}}</td>
                                <td>{{$mahasiswa->gender}}</td>
                                <td>{{$mahasiswa->tanggal_lahir}}</td>
                                <td>{{$mahasiswa->profile}}</td>
                                <td>{{$mahasiswa->kode_prodi}}</td>
                                <td>{{$mahasiswa->user_id}}</td>
                                <td>
                                    <a class="btn btn-warning" role="button">Edit</a>
                                    <a href="{{route('deleteMahasiswa',['nrp'=>$mahasiswa->nrp])}}" class="btn btn-danger" role="button">Delete</a>
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