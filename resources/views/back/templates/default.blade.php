<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/images/logo/logo.png') }}">

    <title>NZ Dental Care | @yield('title', 'Dasboard')</title>

    @include('back.templates.partials.styles')

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('back.templates.partials.navbar')

        <!-- Main Sidebar Container -->
        @include('back.templates.partials.sidebar')


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            {{-- <h1 class="m-0 text-dark">{{ Breadcrumbs::current()->title }}</h1> --}}
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                {{-- {{ Breadcrumbs::render() }} --}}
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>&copy; NZ Dental Care, @php echo date('Y') @endphp.</strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    @include('back.templates.partials.scripts')
</body>
</html>
