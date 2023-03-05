@extends('admin.layout')

@section('content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card widget widget-info">
                        <div class="card-body">
                            <div class="widget-info-container">
                                <div class="widget-info-image" style="background: url('http://127.0.0.1:8000/assets/images/widgets/security.svg')"></div>
                                <h5 class="widget-info-title">Selamat Datang</h5>
                                <p class="widget-info-text m-t-n-xs">Di Fotomedia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection