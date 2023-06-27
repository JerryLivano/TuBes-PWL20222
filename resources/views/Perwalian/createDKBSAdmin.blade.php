@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Form DKBS</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('mataKuliahList')}}">Mata Kuliah</a></li>
                    <li class="breadcrumb-item active">Form DKBS</li>
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
                <form action="{{ route('storeDKBSAdmin', ['perwalian' => $perwalian, 'nrp' => $nrp])}}" method="post">
                    @csrf
                    <div class="form-group my-3">
                        <label for="txtKodeMatkul">Mata Kuliah</label>
                        <select class="form-control" id="txtKodeMatkul" name="txtKodeMatkul" required placeholder="Kode_Matkul">
                            <option value='' disabled selected> Mata Kuliah </option>
                        @foreach ($perwalians as $perwalian)
                            <option value={{$perwalian->kode_matkul}}>{{$perwalian->kode_matkul}} {{$perwalian->nama_matkul}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group my-3">
                        <label for="txtKelas">Kelas</label>
                        <input type="text" id="txtKelas" name="txtKelas" class="form-control" required placeholder="Kelas">
                    </div>
                    <div class="form-group my-3">
                        <label for="txtHari">Hari</label>
                        <input type="text" id="txtHari" name="txtHari" class="form-control" required placeholder="Hari">
                    </div>
                    <div class="form-group my-3">
                        <label for="txtJaw">Jam Awal</label>
                        <input type="text" id="txtJaw" name="txtJaw" class="form-control" required placeholder="Jam Awal">
                    </div>
                    <div class="form-group my-3">
                        <label for="txtJak">Jam Akhir</label>
                        <input type="text" id="txtJak" name="txtJak" class="form-control" required placeholder="Jam Akhir">
                    </div>
                    <div class="form-group my-3">
                        <label for="txtRuangan">Ruangan</label>
                        <input type="text" id="txtRuangan" name="txtRuangan" class="form-control" required placeholder="Ruangan">
                    </div>
                    <div class="text-right">
                        <a href="{{ route("perwalianList") }}" class="btn btn-outline-secondary mr-2" role="button">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>

	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
