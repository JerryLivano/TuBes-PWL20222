@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">List DKBS</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">List DKBS</li>
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
                            <th>Kode Mata Kuliah</th>
                            <th>Kelas</th>
                            <th>Hari</th>
                            <th>Jam Awal</th>
                            <th>Jam Akhir</th>
                            <th>Ruangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perwalian as $perwalians)
                        <tr>
                            <td>{{$perwalians->kode_matkul}}</td>
                            <td>{{$perwalians->kelas}}</td>
                            <td>{{$perwalians->hari}}</td>
                            <td>{{$perwalians->jam_awal}}</td>
                            <td>{{$perwalians->jam_akhir}}</td>
                            <td>{{$perwalians->ruangan}}</td>
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