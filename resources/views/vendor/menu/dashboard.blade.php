@extends('vendor.layout')

@section('content')
<div class="row">
    <div class="col">
        <div class="page-description d-flex align-items-center">
            <div class="page-description-content flex-grow-1">
                <h1>Dashboard</h1>
            </div>
            @if(Auth::guard('vendor')->user()->jenis_vendor == 1)
            <div class="page-description-actions">
                <button data-bs-toggle="modal" data-bs-target="#modelId" class="btn btn-info btn-style-light"><i class="material-icons-outlined">upgrade</i>Upgrade ke Premium</button>
            </div>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4>Selamat Datang di Fotomedia <strong>{{ Auth::guard('vendor')->user()->nama_vendor }}</strong> !</h4>
            </div>
        </div>
    </div>
</div>
<div class="row" hidden>
    <div class="col-xl-4">
        <div class="card widget widget-stats">
            <div class="card-body">
                <div class="widget-stats-container d-flex">
                    <div class="widget-stats-icon widget-stats-icon-primary">
                        <i class="material-icons-outlined">paid</i>
                    </div>
                    <div class="widget-stats-content flex-fill">
                        <span class="widget-stats-title">Today's Sales</span>
                        <span class="widget-stats-amount">$38,211</span>
                        <span class="widget-stats-info">471 Orders Total</span>
                    </div>
                    <div class="widget-stats-indicator widget-stats-indicator-negative align-self-start">
                        <i class="material-icons">keyboard_arrow_down</i> 4%
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card widget widget-stats">
            <div class="card-body">
                <div class="widget-stats-container d-flex">
                    <div class="widget-stats-icon widget-stats-icon-warning">
                        <i class="material-icons-outlined">person</i>
                    </div>
                    <div class="widget-stats-content flex-fill">
                        <span class="widget-stats-title">Active Users</span>
                        <span class="widget-stats-amount">23,491</span>
                        <span class="widget-stats-info">790 unique this month</span>
                    </div>
                    <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                        <i class="material-icons">keyboard_arrow_up</i> 12%
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card widget widget-stats">
            <div class="card-body">
                <div class="widget-stats-container d-flex">
                    <div class="widget-stats-icon widget-stats-icon-danger">
                        <i class="material-icons-outlined">file_download</i>
                    </div>
                    <div class="widget-stats-content flex-fill">
                        <span class="widget-stats-title">Downloads</span>
                        <span class="widget-stats-amount">140,390</span>
                        <span class="widget-stats-info">87 items downloaded</span>
                    </div>
                    <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                        <i class="material-icons">keyboard_arrow_up</i> 7%
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modelId"   style="z-index:99999999 !important;margin-top:150px;">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upgrade</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Harap kontak admin untuk melakukan upgrade.
            </div>
            <button type="button" class="btn btn-primary"style="border-radius : 3%;">Chat</button>
        </div>
    </div>
</div>
@endsection