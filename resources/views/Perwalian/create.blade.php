@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Form Perwalian</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('mataKuliahList')}}">Mata Kuliah</a></li>
                    <li class="breadcrumb-item active">Form Perwalian</li>
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
            <div class="card-body p-3">
                <form action="{{ route('storePerwalian') }}" method="post">
                    @csrf
                    <div class="form-group my-3">
                        <label for="txtSemester">Semester</label>
                        <input type="text" id="txtSemester" name="txtSemester" class="form-control" required placeholder="Semester">
                    </div>
                    <div class="text-right">
                        <a href="{{ route('perwalianList') }}" class="btn btn-outline-secondary mr-2" role="button">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>

	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
