<!-- Main Sidebar Container -->
<style>
    aside {
        overflow-x: hidden;
        position: -webkit-sticky;
        position: sticky;
    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{asset('img/maranatha.png')}}" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text">One Maranatha</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        @auth
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(Auth::user()->profile == NULL)
                <img src="{{asset('img/user-photo-default.png')}}" class="img-circle elevation-2" alt="User Image">
                @else
                <img src="{{asset('img/'. Auth::user()->profile)}}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                @if(Auth::user()->role =='Admin')
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
                @else
                <a href="{{route('profile')}}" class="d-block">{{Auth::user()->name}}</a>
                @endif
            </div>
        </div>
        @endauth

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if(Auth::user()->role =='Admin')
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('userList')}}" class="nav-link">
                        <i class="nav-icon fa fa-user-circle"></i>
                        <p>Mahasiswa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('mataKuliahList')}}" class="nav-link">
                        <i class="nav-icon fa fa-book"></i>
                        <p>Mata Kuliah</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{route('programStudiList')}}" class="nav-link">
                        <i class="nav-icon fa fa-graduation-cap"></i>
                        <p>Program Studi</p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{route('perwalianList')}}" class="nav-link">
                        <i class="nav-icon fa fa-graduation-cap"></i>
                        <p>Perwalian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ruanganList')}}" class="nav-link">
                        <i class="nav-icon fa fa-trello"></i>
                        <p>Ruangan</p>
                    </a>
                </li>

                @elseif (Auth::user()->role =='Mahasiswa')
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('perwalianMahasiswa')}}" class="nav-link">
                        <i class="nav-icon fa fa-graduation-cap"></i>
                        <p>Perwalian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dkbsList')}}" class="nav-link">
                        <i class="nav-icon fa fa-tasks"></i>
                        <p>DKBS</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('mataKuliahMahasiswaList')}}" class="nav-link">
                        <i class="nav-icon fa fa-book"></i>
                        <p>Mata Kuliah</p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <form id="logout-form" action="{{route('logout')}}" method="post">
                        @csrf
                    </form>
                    <a href="javascript:void(0)" class="nav-link" onclick="$('#logout-form').submit();">
                        <i class="nav-icon fa fa-sign-out"></i>
                        <p>Logout</p>
                    </a>
                </li>
                {{-- <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Dashboard
                            <i class="right fa fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>