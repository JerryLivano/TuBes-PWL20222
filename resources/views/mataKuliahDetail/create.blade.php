@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Form Mata Kuliah Detail</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('mataKuliahDetailList')}}">Program Studi</a></li>
                    <li class="breadcrumb-item active">Form Mata Kuliah Detail</li>
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
                <form action="{{ route('storeMataKuliahDetail') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="txtName">Tipe</label>
                        <select id="tipe" type="text" class="form-control @error('tipe') is-invalid @enderror"
                            placeholder="Tipe" name="tipe" value="{{ old('tipe') }}" required autocomplete="tipe"
                            autofocus>
                            <option value="" selected disabled>Select Tipe</option>
                            <option value="Teori">Teori</option>
                            <option value="Praktikum">Praktikum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtName">Kuota</label>
                        <input type="int" id="txtName" name="txtName" class="form-control" required placeholder="Kuota">
                    </div>
                    <div class="form-group">
                        <label for="txtName">Beban SKS</label>
                        <input type="int" id="txtName" name="txtName" class="form-control" required placeholder="Beban SKS">
                    </div>
                    <div class="form-group">
                        <label for="txtName">Hari</label>
                        <input type="text" id="txtName" name="txtName" class="form-control" required placeholder="Hari">
                    </div>
                    <div class="form-group">
                        <label for="txtName">Jam</label>
                        <input type="time" id="txtName" name="txtName" class="form-control" required placeholder="Jam">
                    </div>
                    <div class="form-group">
                        <label for="txtName">Kode Mata Kuliah</label>
                        <select id="kodematkul" type="text" class="form-control @error('kodematkul') is-invalid @enderror"
                            placeholder="KodeMatkul" name="kodematkul" value="{{ old('kodematkul') }}" required autocomplete="kodematkul"
                            autofocus>
                            <option value="" selected disabled>Select Tipe</option>
                            <option value="Teori">Teori</option>
                            <option value="Praktikum">Praktikum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtName">Kode</label>
                        <select id="koderuang" type="text" class="form-control @error('koderuang') is-invalid @enderror"
                            placeholder="KodeRuang" name="koderuang" value="{{ old('koderuang') }}" required autocomplete="koderuang"
                            autofocus>
                            <option value="" selected disabled>Select Tipe</option>
                            <option value="Teori">Teori</option>
                            <option value="Praktikum">Praktikum</option>
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
