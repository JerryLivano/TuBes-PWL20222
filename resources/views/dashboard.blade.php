@extends('layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				@if (Auth::user()->role == 'Admin')
				<h2>Welcome, Admin {{ Auth::user()->name }}</h2>
				@elseif (Auth::user()->role == 'Mahasiswa')
				<h2>Welcome, {{ Auth::user()->name }}</h2>
				@endif
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
			</div>
			<!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		@if (Auth::user()->role == "Admin")
		<div class="card">
            <div class="card-body p-0">
                <table class="table table-hover mb-0 text-center data">
                    <thead>
						<tr>
							<th style="width: 20%;">Tanggal dan Waktu</th>
							<th style="width: 80%;">Keterangan</th>
						</tr>
                    </thead>
                    <tbody>
                        @foreach($triggers as $trigger)
                            <tr>
                                <td style="width: 20%;">{{$trigger->tgl_waktu}}</td>
								@if ($trigger->keterangan == 'Perwalian')
                                <td style="width: 80%;">Mahasiswa NRP {{$trigger->nrp}} sudah melakukan perwalian</td>
								@endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
		@else
		<div class="card">
            <div class="card-body p-0">
                <table class="table table-hover mb-0 text-center data">
					<thead>
						<tr>
							<th style="width: 20%;">Tanggal dan Waktu</th>
							<th style="width: 80%;">Keterangan</th>
						</tr>
                    </thead>
                    <tbody>
                        @foreach($triggers as $trigger)
                            <tr>
                                <td style="width: 20%;">{{$trigger->tgl_waktu}}</td>
								@if ($trigger->keterangan == 'Perwalian')
                                <td style="width: 80%;">Anda sudah melakukan perwalian</td>
								@endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
		@endif
	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection