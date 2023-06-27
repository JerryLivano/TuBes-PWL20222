@extends('layouts.master')

@section('content')
<style>
    .text{
        outline: none;
        border: none;
        text-align: center;
        background: transparent;
    }
</style>
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
                    <li class="breadcrumb-item active">Mata Kuliah Detail</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        @foreach (array("Senin", "Selasa", "Rabu", "Kamis", "Jumat") as $hari)
        <div class="card text-center bg-dark">
            <div class=""><h1>{{ $hari }}</h1></div>
            <div class="card-body p-0 bg-light">
                <table class="table table-hover mb-0">
                    <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Mata Kuliah</th>
                        <th>Kelas</th>
                        <th>Tipe</th>
                        <th>Kuota</th>
                        <th>Beban SKS</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Ruangan</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <form onsubmit=" " method="POST" id="myForm" action="{{ route('tampilMatkulTerpilih') }}">
                            @csrf
                    @if($hari == 'Senin')
                        @foreach($matakuliahdetails[0] as $matkulSenin)
                            <tr>
                                <td>
                                    <input class="text"  type="text" value="{{$matkulSenin -> kode_matkul}} " readonly>
                                </td>
                                <td>
                                    <input  class="text"  type="text" value="{{$matkulSenin -> nama_matkul}}" readonly>
                                </td>
                                <td>
                                    <input  class="text" name="txtKode[{{$matkulSenin -> kelas}}]" type="text" value="{{$matkulSenin -> kelas}} " readonly>
                                </td>
                                <td>
                                    <input  class="text" type="text" name="txtKode[{{$matkulSenin -> tipe}}]" value="{{$matkulSenin -> tipe}}" readonly>
                                </td>
                                <td>
                                    <input  class="text" type="text" value="{{$matkulSenin -> kuota}}" readonly>
                                </td>
                                <td>
                                    <input  class="text" type="text" value="{{$matkulSenin -> beban_sks}}" readonly>
                                </td>
                                <td>
                                    <input  class="text"   type="text" value="{{$matkulSenin -> hari}}" readonly>
                                </td>
                                <td>
                                    <input  class="text" type="text" value="{{$matkulSenin -> jam_awal}} - {{$matkulSenin -> jam_akhir}}" readonly>
                                </td>
                                <td>
                                    <input  class="text" type="text" value=" {{$matkulSenin -> kode_ruang}}" readonly>
                                </td>
                                <td>
                                    <input type="checkbox" onchange="checkSks()"  name="values[]" data-value="{{$matkulSenin->beban_sks}}" class="form-check-input">
                                </td>
                        </tr>
                        @endforeach
                    @elseif ($hari == 'Selasa')
                        @foreach($matakuliahdetails[1] as $matkulSelasa)
                            <tr>
                                <td>
                                    <input class="text" type="text" value="{{$matkulSelasa -> kode_matkul}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value="{{$matkulSelasa -> nama_matkul}}" readonly>
                                </td>
                                <td>
                                    <input class="text" name="txtKode[{{$matkulSelasa -> kelas}}]" type="text" value="{{$matkulSelasa -> kelas}}" readonly>
                                </td>
                                <td>
                                    <input class="text" name="txtKode[{{$matkulSelasa -> tipe}}]" type="text" value="{{$matkulSelasa -> tipe}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value="{{$matkulSelasa -> kuota}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value="{{$matkulSelasa -> beban_sks}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value="{{$matkulSelasa -> hari}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value="{{$matkulSelasa -> jam_awal}} - {{$matkulSelasa -> jam_akhir}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value=" {{$matkulSelasa -> kode_ruang}}" readonly>
                                </td>
                                <td>
                                    <input type="checkbox" onchange="checkSks()" name="values[]" data-value="{{$matkulSelasa->beban_sks}}" class="form-check-input">
                                </td>
                        </tr>
                        @endforeach
                    @elseif ($hari == 'Rabu')
                        @foreach($matakuliahdetails[2] as $matkulRabu)
                            <tr>
                                <td>
                                    <input class="text" type="text" value="{{$matkulRabu -> kode_matkul}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value="{{$matkulRabu -> nama_matkul}}" readonly>
                                </td>
                                <td>
                                    <input class="text" name="txtKode[{{$matkulRabu -> kelas}}]" type="text" value="{{$matkulRabu -> kelas}}" readonly>
                                </td>
                                <td>
                                    <input class="text" name="txtKode[{{$matkulRabu -> tipe}}]" type="text" value="{{$matkulRabu -> tipe}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value="{{$matkulRabu -> kuota}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text"  value="{{$matkulRabu -> beban_sks}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value="{{$matkulRabu -> hari}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value="{{$matkulRabu -> jam_awal}} - {{$matkulRabu -> jam_akhir}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value=" {{$matkulRabu -> kode_ruang}}" readonly>
                                </td>
                                <td>
                                    <input type="checkbox" onchange="checkSks()" name="values[]" data-value="{{$matkulRabu->beban_sks}}" class="form-check-input">
                                </td>
                        </tr>
                        @endforeach
                    @elseif ($hari == 'Kamis')
                        @foreach($matakuliahdetails[3] as $matkulKamis)
                            <tr>
                                <td>
                                    <input class="text" type="text" value="{{$matkulKamis -> kode_matkul}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value="{{$matkulKamis -> nama_matkul}}" readonly>
                                </td>
                                <td>
                                    <input class="text" name="txtKode[{{$matkulKamis -> kelas}}]" type="text" value="{{$matkulKamis -> kelas}}" readonly>
                                </td>
                                <td>
                                    <input class="text" name="txtKode[{{$matkulKamis -> tipe}}]" type="text" value="{{$matkulKamis -> tipe}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value="{{$matkulKamis -> kuota}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value="{{$matkulKamis -> beban_sks}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value="{{$matkulKamis -> hari}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value="{{$matkulKamis -> jam_awal}} - {{$matkulKamis -> jam_akhir}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value=" {{$matkulKamis -> kode_ruang}}" readonly>
                                </td>
                                <td>
                                    <input type="checkbox" onchange="checkSks()" name="values[{{$matkulKamis->beban_sks}}]" data-value="{{$matkulKamis->beban_sks}}" class="form-check-input">
                                </td>
                        </tr>
                        @endforeach
                    @elseif ($hari == 'Jumat')
                        @foreach($matakuliahdetails[4] as $matkulJumat)
                            <tr>
                                <td>
                                    <input class="text" type="text" value="{{$matkulJumat -> kode_matkul}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value="{{$matkulJumat -> nama_matkul}}" readonly>
                                </td>
                                <td>
                                    <input class="text" name="txtKode[{{$matkulJumat -> kelas}}]" type="text" value="{{$matkulJumat -> kelas}}" readonly>
                                </td>
                                <td>
                                    <input class="text" name="txtKode[{{$matkulJumat -> tipe}}]" type="text" value="{{$matkulJumat -> tipe}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value="{{$matkulJumat -> kuota}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value="{{$matkulJumat -> beban_sks}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value="{{$matkulJumat -> hari}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value="{{$matkulJumat -> jam_awal}} - {{$matkulJumat -> jam_akhir}}" readonly>
                                </td>
                                <td>
                                    <input class="text" type="text" value=" {{$matkulJumat -> kode_ruang}}" readonly>
                                </td>
                                <td>
                                    <input type="checkbox" onchange="checkSks()" name="values[{{$matkulJumat->beban_sks}}]" data-value="{{$matkulJumat->beban_sks}}" class="form-check-input">
                                </td>
                        </tr>
                        @endforeach
                    @endif    
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
        <div class="text-right">
            <button type="submit" onclick="submitForm()" class="btn btn-primary">Save</button>
        </div>
    </form>
        {{-- main content here --}}
    </div><!-- /.container-fluid -->
</div>
<script>
    let checkboxes = document.querySelectorAll('input[type="checkbox"]');
    function checkSks(){
        let totalSks = 0;
        checkboxes.forEach(function (checkbox) {
            if (checkbox.checked) {
                totalSks += parseInt(checkbox.dataset.value);
            }
        })
        checkboxes.forEach(function (checkbox) {
            let jumlah = totalSks + parseInt(checkbox.dataset.value);
            if(jumlah>6 && checkbox.checked == false){
                checkbox.disabled=true
            } else {
                checkbox.disabled=false
            }
        })
        console.log(totalSks)
        };


    function submitForm() {
        document.getElementById('myForm').submit(); // Submit the form
    }
</script>
<!-- /.content -->
@endsection
