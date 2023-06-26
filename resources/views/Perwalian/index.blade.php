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
					<li class="breadcrumb-item active">Perwalian</li>
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
                <a href="{{ route('createPerwalian') }}" class="btn btn-primary" role="button">Input Jadwal Perwalian</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0 text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Semester</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>DKBS</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perwalian as $perwalians)
                        <tr>
                                <td>{{$perwalians->id}}</td>
                                <td>{{$perwalians->semester}}</td>
                                <td>
                                    @if($perwalians->status == 1)
                                    {{"Active"}}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('editPerwalian', ['id' => $perwalians->id]) }}" class="btn btn-warning" role="button" style="cursor: pointer;"><i class="nav-icon fa fa-edit"></i></a>
                                    <a href="{{route('deletePerwalian',['id'=>$perwalians->id])}}" class="btn btn-danger" role="button" style="cursor: pointer; color: white;"><i class="nav-icon fa fa-trash"></i></a>
                                </td>
                                <td>
                                    <a href="{{route('dkbsAdminList',['id'=>$perwalians->id])}}" class="btn btn-info" role="button" style="cursor: pointer; color: white;"><i class="nav-icon fa fa-tasks"></i> List</a>
                                </td>
                                <td>
                                    @if($perwalians->status == 1)
                                    <a href="{{route('deactive')}}" style="cursor: pointer; font-size:24px; color:green;"><i class="nav-icon fa fa-toggle-on"></i></a>
                                    @else
                                    <a href="{{route('activate',['id'=>$perwalians->id])}}" style="cursor: pointer; font-size:24px; color:green;"><i class="nav-icon fa fa-toggle-off"></i></a>
                                    @endif
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