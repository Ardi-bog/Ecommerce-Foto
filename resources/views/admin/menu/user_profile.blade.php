@extends('layout')

@section('content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Profile User </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="./profile/edit" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="txt-username-edit" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Username" value="{{ $user->username }}" {{ Auth::user()->role_id==4?'disabled':'' }}>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPelanggan2" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="row m-t-lg">
                                    <div class="col-md-6">
                                        <label for="inputNama2" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="inputNama2" name="nama" required value="{{ $user->nama }}">
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <label for="settingsPhoneNumber" class="form-label">No Telp</label>
                                        <input type="text" class="form-control" id="settingsPhoneNumber" name="no_telp" placeholder="(xxx) xxx-xxxx" value="{{ $user->no_telp }}" required>
                                    </div>
                                </div>
                                <div class="row m-t-lg">
                                    <div class="col">
                                        <label for="settingsAbout" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="inputAlamat2" name="alamat" required value="{{ $user->alamat }}">
                                    </div>
                                    <input type="hidden" class="form-control" id="inputId" name="id" required value="{{ $user->id }}"><br>
                                    <input type="hidden" class="form-control" id="inputId" name="role_id" required value="{{ $user->role_id }}"><br>
                                </div>
                                <div class="row m-t-lg">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary m-t-sm">Update</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection