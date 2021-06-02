<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('assets/images/logo/logo.png') }}" alt="logo nz" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">NZ Dental Care</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        {{-- <i class="nav-icon fas fa-tags"></i> --}}
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('patient_index') }}" class="nav-link">
                        <i class="nav-icon fas fa-notes-medical"></i>
                        <p>
                            Daftar Pasien
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Data Master
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('slider_index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Slide</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tindakan_index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Tindakan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category_index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Kategori Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product_index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Produk</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('change_password') }}" class="nav-link">
                        <i class="nav-icon fas fa-key"></i>
                        <p>
                            Ganti Password
                        </p>
                    </a>
                </li>


                <li class="nav-item">

                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{-- <i class="nav-icon fas fa-tags"></i> --}}
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

                
                {{-- <li class="nav-header">EXAMPLES</li> --}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
