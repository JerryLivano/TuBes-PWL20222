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
                        <label for="txtName">Nama Mata Kuliah</label>
                        <input type="text" id="txtName" name="txtName" class="form-control" required placeholder="Nama Mata Kuliah" value="{{ $mataKuliah->nama_matkul }}">
                        <label for="txtSemester">Semester</label>
                        <input type="text" id="txtSemester" name="txtSemester" class="form-control" required placeholder="Semester" value="{{ $mataKuliah->semester }}">
                        <label for="txtBebanSks">Beban SKS</label>
                        <input type="int" id="txtBebanSks" name="txtBebanSks" class="form-control" required placeholder="Beban SKS" value="{{ $mataKuliah->beban_sks }}">
                        <label for="txtDeskripsi">Deskripsi</label>
                        <input type="text" id="txtDeskripsi" name="txtDeskripsi" class="form-control" required placeholder="Deskripsi" value="{{ $mataKuliah->deskripsi }}">
                        <!-- <label for="txtKodeProdi">Program Studi</label> -->
                        <!-- <select name="txtKodeProdi" class="form-control">
                            <option>Select Program Studi</option>
                            @foreach ($prodi as $prodis)
                                <option value="{{$prodis->kode_prodi}}">{{$prodis->nama_prodi}}</option>
                            @endforeach
                       </select> -->
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
