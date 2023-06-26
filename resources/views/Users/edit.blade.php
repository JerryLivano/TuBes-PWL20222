@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('programStudiList')}}">Program Studi</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
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
                <form action="{{route('UpdateUserList', ['id'=>$user -> id])}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="id">NRP</label>
                        <input id="id" type="text" class="form-control" required placeholder="ID" name="id" readonly value="{{ $user -> id }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input id="name" type="text" class="form-control" required placeholder="Full name" name="name" value="{{ $user -> name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" required name="email" value="{{ $user -> email }}" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select id="role" type="text" class="form-control" required placeholder="Role" name="role">
                            <option value="" {{ $user -> role === '' ? 'selected' : ''}} disabled>Select Role</option>
                            <option value="Mahasiswa" {{ $user -> role === 'Mahasiswa' ? 'selected' : ''}}>Mahasiswa</option>
                            <option value="Admin" {{ $user -> role === 'Admin' ? 'selected' : ''}}>Admin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input id="alamat" type="text" class="form-control" placeholder="Alamat" name="alamat" value="{{ $user -> alamat }}">
                    </div>

                    <label for="gender">Jenis Kelamin</label>
                    <div class="form-group">
                        <select id="gender" type="text" class="form-control" placeholder="Gender" name="gender" autofocus>
                            <option value="" {{ $user -> gender === '' ? 'selected' : ''}} disabled>Select Gender</option>
                            <option value="Laki-laki" {{ $user -> gender === 'Laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                            <option value="Perempuan" {{ $user -> gender === 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal_lahir</label>
                        <input id="tanggal_lahir" type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" value="{{ $user -> tanggal_lahir }}">
                    </div>

                    <div class="form-group">
                        <label for="profile">Foto Profil</label><br>
                        <input id="profile" type="file" class="" name="profile" value="{{ $user -> profile }}">
                    </div>

                    <label for="kode_prodi">Prodi</label>
                    <div class="input-group mb-3">
                        <select id="kode_prodi" type="text" class="form-control"
                            placeholder="Kode Prodi" name="kode_prodi" value="{{ $user -> nama_prodi }}" required autocomplete="kode_prodi"
                            autofocus>
                            <option selected disabled>Select Prodi</option>
                            {{$prodi = \App\ProgramStudi::all()}}
                            @foreach ($prodi as $prodis)
                                <option value="{{$prodis->kode_prodi}}" {{ $user -> kode_prodi === $prodis->kode_prodi ? 'selected' : ''}}>{{$prodis->nama_prodi}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <a href="{{ route('EditPasswordUserList', ['id'=>$user -> id]) }}" class="btn btn-warning " role="button">Change Password</a>
                    </div>

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