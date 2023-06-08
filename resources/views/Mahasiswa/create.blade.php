@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Form Mahasiswa</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('mahasiswaList')}}">Program Studi</a></li>
                    <li class="breadcrumb-item active">Form Program Studi</li>
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
                <form action="{{ route('storeMahasiswa') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nrp">NRP</label>
                        <input type="text" id="nrp" name="nrp" class="form-control" required placeholder="NRP">
                    </div>
                    <div class="form-group">
                        <label for="txtName">Nama Mahasiswa</label>
                        <input type="text" id="txtName" name="txtName" class="form-control" required placeholder="Nama Mahasiswa">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea type="text" id="alamat" name="alamat" class="form-control" required placeholder="Alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option disabled selected>-- Pilih Gender --</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                       </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" required placeholder="Tanggal Lahir">
                    </div>
                    <div class="form-group">
                        <label for="prodi">Program Studi</label>
                        <select name="prodi" id="prodi" class="form-control">
                            <option disabled selected>-- Pilih Program Studi --</option>
                            @foreach ($prodi as $prodis)
                                <option value="{{$prodis->kode_prodi}}">{{$prodis->nama_prodi}}</option>
                            @endforeach
                       </select>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('programStudiList') }}" class="btn btn-outline-secondary mr-2" role="button">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>

	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
