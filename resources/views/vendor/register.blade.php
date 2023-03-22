

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
    <title>VENDOR</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="{{ asset('/') }}assets-admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets-admin/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets-admin/plugins/pace/pace.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets-admin/plugins/datatables/datatables.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets-admin/plugins/select2/css/select2.min.css" rel="stylesheet">

    
    <!-- Theme Styles -->
    <link href="{{ asset('/') }}assets-admin/css/main.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets-admin/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/') }}assets-admin/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/') }}assets-admin/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{ asset('/') }}assets-admin/plugins/jquery/jquery-3.5.1.min.js"></script>
    <style>
        .select2-container--open {
            z-index: 9999999
        }
    </style>
</head>
<body>
    <div class="app w-100 h-100">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <center><h2>VENDOR</h2></center>
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif


                        <!-- @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif -->
                        <form action="{{ url('/vendor/doRegister') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="txt-username-edit" class="form-label">Nama Vendor</label>
                                    <input type="text" class="form-control" name="nama_vendor" placeholder="Nama Vendor">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="txt-username-edit" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="inputPelanggan2" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" class="form-control" name="like" value="0" placeholder="Password">
                                </div>
                            </div>
                            <div class="row m-t-lg">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary m-t-sm col-md-12">Register</a>
                                </div>
                            </div>
                        </form>
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
    <script src="{{ asset('/') }}assets-admin/plugins/datatables/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if(session('success'))
            swal({
                title: "Wow!",
                text: "Message!",
                type: "success"
            }, function() {
                window.location = "http://wa.me/6285156179309";
            });
        @endif
    </script>
</body>
</html>