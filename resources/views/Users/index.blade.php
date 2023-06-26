@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Mahasiswa</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Mahasiswa</li>
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
            <div class="card-header text-right">
                <a href="{{ route('createUserList') }}" class="btn btn-primary" role="button">Tambah Mahasiswa</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0 text-center">
                    <thead>
                        <tr>
                            <th>Foto Profile</th>
                            <th>NRP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Gender</th>
                            <th>Tanggal Lahir</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                @if($user->profile == NULL)
                                <img src="{{asset('img/user-photo-default.png')}}" class="img-circle" alt="User Image" width="100" height="100">
                                @else
                                <img src="{{asset('img/' . $user->profile)}}" class="img-circle" alt="User Image" width="100" height="100">
                                @endif
                            </td>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->alamat}}</td>
                            <td>{{$user->gender}}</td>
                            <td>{{$user->tanggal_lahir}}</td>
                            <td>
                                <a href="{{ route('EditUserList', ['id' => $user->id]) }}" class="btn btn-warning" role="button" style="cursor: pointer;"><i class="nav-icon fa fa-edit"></i></a>
                                <a href="{{ route('deleteUser',['id'=>$user->id])}}" class="btn btn-danger" role="button" style="cursor: pointer; color: white;"><i class="nav-icon fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- main content here --}}

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection