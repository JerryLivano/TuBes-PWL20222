@extends('layouts.master')

@section('content')
<style>
    input{
        outline: none;
        border: none;
        text-align: center;
        background: transparent;
    }
</style>
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
<div class="content">
    <div class="container-fluid">
    
        <div class="card text-center bg-dark">
           
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
                        <th>Jam Awal</th>
                        <th>Jam Akhir</th>
                        <th>Ruangan</th>
                    </tr>
                    </thead>
                    <tbody> 
                        <form action="{{ route('ConfirmDKBS') }}" method="POST">
                            @csrf
                        @foreach ($perwalian as $perwalians)
                        
                            <tr>
                                <td>
                                    <input name="txtKode" value="{{$perwalians -> kode_matkul}}" readonly>
                                </td>
                                <td>
                                    <input name="txtName" value=" {{$perwalians -> nama_matkul}}" readonly>
                                </td>
                                <td>
                                    <input name="txtKelas" value=" {{$perwalians -> kelas}}" readonly>
                                </td>
                                <td>
                                    <input name="txtTipe" value=" {{$perwalians->tipe}}" readonly>
                                </td>
                                <td>
                                    <input name="txtSks" value=" {{$perwalians->beban_sks}}" readonly>
                                </td>
                                <td>
                                    <input name="txtKuota" value=" {{$perwalians->kuota}}" readonly >
                                </td>
                                <td>
                                    <input name="txtHari" value=" {{$perwalians -> hari}}" readonly>
                                </td>
                                <td>
                                    <input name="txtAwal" value=" {{$perwalians -> jam_awal}}" readonly>
                                </td>
                                <td>
                                    <input name="txtAkhir" value=" {{$perwalians -> jam_akhir}}" readonly>
                                </td>
                                <td>
                                    <input name="txtRuang" value=" {{$perwalians -> nama_ruang}}" readonly>
                                </td>
                                {{-- <td>{{$perwalians -> semester}} --}}
                                {{-- <td>{{$perwalians -> kode_ruangan}} --}}
                                    
                            </tr>

                        @endforeach
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </tbody>
                </table>
                
                            
            </div>

        </div>
    </div>
</div>                          
<!-- /.content-header -->
@endsection