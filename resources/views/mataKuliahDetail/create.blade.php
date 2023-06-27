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
                        <label for="txtId">Tipe</label>
                        <select id="txtId" type="text" class="form-control @error('tipe') is-invalid @enderror"
                            placeholder="Tipe" name="tipe" value="{{ old('tipe') }}" required autocomplete="tipe"
                            autofocus>
                            <option value="" selected disabled>Select Tipe</option>
                            <option value="Teori">Teori</option>
                            <option value="Praktikum">Praktikum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtKelas">Kelas</label>
                        <select id="txtKelas" type="text" class="form-control @error('tipe') is-invalid @enderror"
                            placeholder="Tipe" name="tipe" value="{{ old('tipe') }}" required autocomplete="tipe"
                            autofocus>
                            <option value="" selected disabled>Select Kelas</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtKuota">Kuota</label>
                        <input type="int" id="txtKuota" name="txtName" class="form-control" required placeholder="Kuota">
                    </div>
                    <div class="form-group">
                        <label for="txtHari">Hari</label>
                        <input type="text" id="txtHari" name="txtName" class="form-control" required placeholder="Hari">
                    </div>
                    <div class="form-group">
                        <label for="txtJamAwal">Jam Awal</label>
                        <input type="time" id="txtJamAwal" name="txtName" class="form-control" required placeholder="Jam">
                    </div>
                    <div class="form-group">
                        <label for="txtJamAkhir">Jam Akhir</label>
                        <input type="time" id="txtJamAkhir" name="txtName" class="form-control" required placeholder="Jam">
                    </div>
                    <div class="form-group">
                        <label for="txtKodeMatkul">Mata Kuliah</label>
                        <select id="txtKodeMatkul" type="text" class="form-control @error('kodematkul') is-invalid @enderror"
                            placeholder="KodeMatkul" name="matkul" value="{{ old('kodematkul') }}" required autocomplete="matkul"
                            autofocus>
                            <option value="" selected disabled>Select Tipe</option>
                            @foreach ($matkul as $matkuls)
                            <option value="{{$matkuls->kode_matkul}}">{{$matkuls->nama_matkul}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtKodeRuang">Perwalian</label>
                        <select id="txtPerwalianId" type="text" class="form-control @error('koderuang') is-invalid @enderror"
                        placeholder="KodeRuang" name="perwalian" value="{{ old('koderuang') }}" required autocomplete="perwalian"
                            autofocus>
                            <option value="" selected disabled>Select Tipe</option>
                            @foreach ($perwalian as $perwalians)
                            <option value="{{$perwalians->id}}">{{$perwalians->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtKodeRuang">Ruangan</label>
                        <select id="txtKodeRuang" type="text" class="form-control @error('koderuang') is-invalid @enderror"
                        placeholder="KodeRuang" name="ruang" value="{{ old('koderuang') }}" required autocomplete="ruang"
                            autofocus>
                            <option value="" selected disabled>Select Tipe</option>
                            @foreach ($ruang as $ruangs)
                            <option value="{{$ruangs->kode_ruang}}">{{$ruangs->nama_ruang}}</option>
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
