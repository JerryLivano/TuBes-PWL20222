@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Program Studi Edit</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('mahasiswaList')}}">Mahasiswa</a></li>
                    <li class="breadcrumb-item"><a href="{{route('mataKuliahList')}}">Mata Kuliah</a></li>
                    <li class="breadcrumb-item"><a href="{{route('programStudiList')}}">Program Studi</a></li>
					<li class="breadcrumb-item active">Program Studi Form</li>
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
            <div class="card-body p-2">
                <form action="{{ route('updateMataKuliah',['kode_matkul'=>$mataKuliah -> kode_matkul]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="txtKodeMatkul">Kode Mata Kuliah</label>
                        <input type="text" id="txtKodeMatkul" name="txtKodeMatkul" class="form-control" required placeholder="Kode Mata Kuliah" readonly value="{{ $mataKuliah->kode_matkul }}">
                    </div>
                    <div class="form-group">
                        <label for="txtName">Nama Mata Kuliah</label>
                        <input type="text" id="txtName" name="txtName" class="form-control" required placeholder="Nama Mata Kuliah" value="{{ $mataKuliah->nama_matkul }}">
                    </div>
                    <div class="form-group">
                        <label for="txtSemester">Semester</label>
                        <input type="text" id="txtSemester" name="txtSemester" class="form-control" required placeholder="Semester" value="{{ $mataKuliah->semester }}">
                    </div>
                    <div class="form-group">    
                        <label for="txtBebanSks">Beban SKS</label>
                        <input type="int" id="txtBebanSks" name="txtBebanSks" class="form-control" required placeholder="Beban SKS" value="{{ $mataKuliah->beban_sks }}">
                    <div class="form-group">        
                        <label for="txtDeskripsi">Deskripsi</label>
                        <textarea type="text" id="txtDeskripsi" name="txtDeskripsi" class="form-control">
                            {{ $mataKuliah->deskripsi }}
                        </textarea>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('mataKuliahList') }}" class="btn btn-outline-secondary mr-2" role="button">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
