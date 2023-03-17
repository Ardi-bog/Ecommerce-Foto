<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Title -->
    <title>Vendor Fotomedia</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="{{ asset('/') }}assets-admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets-admin/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets-admin/plugins/pace/pace.css" rel="stylesheet">

    
    <!-- Theme Styles -->
    <link href="{{ asset('/') }}assets-admin/css/main.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets-admin/css/horizontal-menu/horizontal-menu.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets-admin/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/') }}assets-admin/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/') }}assets-admin/images/neptune.png" />

    <link href="{{ asset('/') }}assets-admin/plugins/summernote/summernote-lite.min.css" rel="stylesheet">
    <script src="{{ asset('/') }}assets-admin/plugins/jquery/jquery-3.5.1.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="app horizontal-menu align-content-stretch d-flex flex-wrap">
        <div class="app-container">
            <div class="search container">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg container">
                    <div class="container-fluid">
                        <div class="navbar-nav" id="navbarNav">
                            <div class="logo">
                                <a href="index.html">Fotomedia</a>
                            </div>
            
                        </div>
                        <div class="d-flex" >
                            <ul class="navbar-nav">
                                <li class="nav-item hidden-on-mobile">  
                                    @if(Auth::guard('vendor')->user()->jenis_vendor == 1)
                                        <div class="btn-group">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                        Free
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item disabled" href="#">Disabled action</a>
                                                <h6 class="dropdown-header">Section header</h6>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">After divider action</a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="btn btn-success">Premium</div>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="app-menu">
                <div class="container">
                    <ul class="menu-list">
                        @php 
                            $url = Request::segment(2);
                        @endphp
                        <li class="{{ $url == '' ? 'active-page' : '' }}">
                            <a href="{{ url('/vendor') }}" class="{{ $url == '' ? 'active' : '' }}">Dashboard</a>
                        </li>
                        <li class="{{ $url == 'detail' ? 'active-page' : '' }}">
                            <a href="{{ url('/vendor/detail') }}" class="{{ $url == 'detail' ? 'active' : '' }}">Detail</a>
                        </li>
                        <li class="{{ $url == 'ubah-password' ? 'active-page' : '' }}">
                            <a href="{{ url('/vendor/ubah-password') }}" class="{{ $url == 'ubah-password' ? 'active' : '' }}">Ubah Password</a>
                        </li>
                        <li >
                            <a href="{{ url('/vendor/logout') }}" >Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="app-content">
                <div class="content-wrapper">
                    <div class="container">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Javascripts -->
    <script src="{{ asset('/') }}assets-admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}assets-admin/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('/') }}assets-admin/plugins/pace/pace.min.js"></script>
    <script src="{{ asset('/') }}assets-admin/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('/') }}assets-admin/js/main.min.js"></script>
    <script src="{{ asset('/') }}assets-admin/js/custom.js"></script>
    <script src="{{ asset('/') }}assets-admin/plugins/datatables/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="{{ asset('/') }}assets-admin/plugins/select2/js/select2.full.min.js"></script> -->
    <script src="{{ asset('/') }}assets-admin/plugins/summernote/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.datatables').DataTable();
        } );
        
        @if (session('status'))
            Swal.fire(
                "{{ session('status') == 1 ? 'Berhasil' : 'Gagal' }}",
                "{{ session('msg') }}",
                "{{ session('status') == 1 ? 'success' : 'error' }}",
            )
        @endif
        
        function isNumberKey(txt, evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode == 46) {
                //Check if the text already contains the . character
                if (txt.value.indexOf('.') === -1) {
                return true;
                } else {
                return false;
                }
            } else {
                if (charCode > 31 &&
                (charCode < 48 || charCode > 57))
                return false;
            }
            return true;
        }
    </script>
</body>
</html>