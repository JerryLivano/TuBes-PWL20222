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
        @foreach (array("Senin", "Selasa", "Rabu", "Kamis", "Jumat") as $hari)
        <div class="card text-center bg-dark">
            <div class=""><h1>{{ $hari }}</h1></div>
            <div class="card-body p-0 bg-light">
            <form>
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
                        @foreach ($perwalian as $perwalians)
                        <tr>
                            <td>{{$perwalians -> kode_matkul}}</td>
                            <td>{{$perwalians -> kode_matkul}}</td>
                            <td>{{$perwalians -> kode_matkul}}</td>
                            <td>{{$perwalians -> kode_matkul}}</td>
                            <td>{{$perwalians -> kode_matkul}}</td>
                            <td>{{$perwalians -> kode_matkul}}</td>
                            <td>{{$perwalians -> kode_matkul}}</td>
                            <td>{{$perwalians -> kode_matkul}}</td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit">
            </form>
                            
                                
<!-- /.content-header -->