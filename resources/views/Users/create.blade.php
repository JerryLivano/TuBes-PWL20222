@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Form New User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('programStudiList')}}">Program Studi</a></li>
                    <li class="breadcrumb-item active">Form New User</li>
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
                <form action="{{route('storeUserList')}}" method="post">
                    @csrf

                    <label for="id">NRP/NIK</label>
                    <div class="input-group mb-3">
                        <input id="id" type="text" class="form-control @error('id') is-invalid @enderror"
                            placeholder="NRP/NIK" name="id" value="{{ old('id') }}" required autocomplete="id"
                            autofocus>
                    </div>
                    @error('id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="name">Nama</label>
                    <div class="input-group mb-3">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Full name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="email">Email</label>
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="Email" required autocomplete="email">
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="password">Password</label>
                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="input-group mb-3">
                        <input id="password-confirm" type="password" class="form-control" placeholder="Retype password" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <label for="role">Role</label>
                    <div class="input-group mb-3">
                        <select id="role" type="text" class="form-control @error('role') is-invalid @enderror" placeholder="Role" name="role" value="{{ old('role') }}" required autocomplete="role" autofocus>
                            <option selected disabled>Select Role</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="address">Alamat</label>
                    <div class="input-group mb-3">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Alamat" name="address" value="{{ old('address') }}" autofocus>
                    </div>
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="gender">Jenis Kelamin</label>
                    <div class="input-group mb-3">
                        <select id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" placeholder="Gender" name="gender" value="{{ old('gender') }}" autofocus>
                            <option value="" selected disabled>Select Gender</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <div class="input-group mb-3">
                        <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="Tanggal Lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" autofocus>
                    </div>
                    @error('tanggal_lahir')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="profile">Foto Profil</label>
                    <div class="input-group mb-3">
                        <input id="profile" type="file" class="file @error('profile') is-invalid @enderror" placeholder="Foto Profil" name="profile"  value="{{ old('profile') }}" accept="image/*" autofocus>
                    </div>
                    @error('profile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="kode_prodi">Prodi</label>
                    <div class="input-group mb-3">
                        <select id="kode_prodi" type="text" class="form-control @error('kode_prodi') is-invalid @enderror"
                            placeholder="Kode Prodi" name="kode_prodi" value="{{ old('kode_prodi') }}" required autocomplete="kode_prodi"
                            autofocus>
                            <option selected disabled>Select Prodi</option>
                            {{$prodi = \App\ProgramStudi::all()}}
                            @foreach ($prodi as $prodis)
                                <option value="{{$prodis->kode_prodi}}">{{$prodis->nama_prodi}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('kode_prodi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="text-right">
                        <a href="{{ route('userList') }}" class="btn btn-outline-secondary mr-2" role="button">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection