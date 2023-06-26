@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">DKBS Mahasiswa</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">DKBS Mahasiswa</li>
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
            <div class="card-body p-0">
                <table class="table table-hover mb-0 text-center">
                    <thead>
                        <tr>
                            <th>NRP</th>
                            <th>Nama</th>
                            <th>DKBS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perwalian as $perwalians)
                        <tr>
                            <td>{{$perwalians->nrp}}</td>
                            <td>{{$perwalians->name}}</td>
                            <td><a href="{{route('dkbsAdminMahasiswaList',['id'=>$perwalians->id, 'nrp'=>$perwalians->nrp])}}" class="btn btn-info" role="button" style="cursor: pointer; color: white;"><i class="nav-icon fa fa-tasks"></i></a></td>
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