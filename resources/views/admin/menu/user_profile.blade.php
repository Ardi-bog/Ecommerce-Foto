@extends('admin/layout')

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
                            <form action="{{ url('/admin/editProfile') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="txt-username-edit" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Username" value="{{ $user->username }}" {{ Auth::user()->role_id==4?'disabled':'' }}>
                                    </div>
                                </div>
                                <div class="row m-t-lg">

                                <div class="col-md-12">
                                        <label for="inputPelanggan2" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="row m-t-lg">
                                    <div class="col-md-12">
                                        <label for="inputNama2" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="inputNama2" name="nama" required value="{{ $user->name }}">
                                        
                                    </div>
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