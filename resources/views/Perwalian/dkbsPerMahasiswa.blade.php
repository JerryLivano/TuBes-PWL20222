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
            <div class="card-header text-right">
                <a href="{{route('createDKBSAdmin', ['perwalian' => $perwalian[0]->perwalian_id, 'nrp' => $perwalian[0]->nrp])}}"  class="btn btn-primary" role="button">Input DKBS</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0 text-center">
                    <thead>
                        <tr>
                            <th>Kode Mata Kuliah</th>
                            <th>Kelas</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                            <th>Ruangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perwalian as $perwalians)
                        <tr>
                            <td>{{$perwalians->kode_matkul}}</td>
                            <td>{{$perwalians->kelas}}</td>
                            <td>{{$perwalians->hari}}</td>
                            <td>{{$perwalians->jam_awal}}-{{$perwalians->jam_akhir}}</td>
                            <td>{{$perwalians->ruangan}}</td>
                            <td>
                                <a href="{{route('deleteDKBSAdmin',['perwalian' => $perwalians->perwalian_id, 'nrp' => $perwalians->nrp, 'kode_matkul' => $perwalians->kode_matkul])}}" class="btn btn-danger" role="button" style="cursor: pointer; color: white;"><i class="nav-icon fa fa-trash"></i></a>
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