@extends('auth.master')

@section('content')

<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">{{ __('Register') }}</p>

        <form action="{{route('register')}}" method="post">
            @csrf

            <div class="input-group mb-3">
                <input id="id" type="text" class="form-control @error('id') is-invalid @enderror"
                    placeholder="NRP/NIK" name="id" value="{{ old('id') }}" required autocomplete="id"
                    autofocus>
                <div class="input-group-append input-group-text">
                    <span class="fa fa-user"></span>
                </div>
            </div>
            @error('id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="input-group mb-3">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                    placeholder="Full name" name="name" value="{{ old('name') }}" required autocomplete="name"
                    autofocus>
                <div class="input-group-append input-group-text">
                    <span class="fa fa-user"></span>
                </div>
            </div>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="input-group mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{old('email')}}" placeholder="Email" required autocomplete="email">
                <div class="input-group-append input-group-text">
                    <span class="fa fa-envelope"></span>
                </div>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="input-group mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password" name="password" required autocomplete="new-password">
                <div class="input-group-append input-group-text">
                    <span class="fa fa-lock"></span>
                </div>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="input-group mb-3">
                <input id="password-confirm" type="password" class="form-control" placeholder="Retype password"
                    name="password_confirmation" required autocomplete="new-password">
                <div class="input-group-append input-group-text">
                    <span class="fa fa-lock"></span>
                </div>
            </div>

            <div class="input-group mb-3">
                <select id="role" type="text" class="form-control @error('role') is-invalid @enderror"
                    placeholder="Role" name="role" value="{{ old('role') }}" required autocomplete="role"
                    autofocus>
                    <option value="" selected disabled>Select Role</option>
                    <option value="Mahasiswa">Mahasiswa</option>
                    <option value="Admin">Admin</option>
                </select>
                <div class="input-group-append input-group-text">
                    <span class="fa fa-users"></span>
                </div>
            </div>
            @error('role')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="input-group mb-3">
                <select id="kode_prodi" type="text" class="form-control @error('kode_prodi') is-invalid @enderror"
                    placeholder="Kode Prodi" name="kode_prodi" value="{{ old('kode_prodi') }}" required autocomplete="kode_prodi"
                    autofocus>
                    <option value="" selected disabled>Prodi</option>
                    {{$prodi = \App\ProgramStudi::all()}}
                    @foreach ($prodi as $prodis)
                        <option value="{{$prodis->kode_prodi}}">{{$prodis->nama_prodi}}</option>
                    @endforeach
                </select>
                <div class="input-group-append input-group-text">
                    <span class="fa fa-users"></span>
                </div>
            </div>
            @error('kode_prodi')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="row">
                <div class="col-4 offset-8">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Register') }}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        @if (Route::has('login'))
        <hr>
        <p class="mb-0 text-center">
            <a href="{{ route('login') }}" class="text-center">{{ __('Sudah punya akun? Login sekarang') }}</a>
        </p>
        @endif
    </div>
    <!-- /.login-card-body -->
</div>
@endsection