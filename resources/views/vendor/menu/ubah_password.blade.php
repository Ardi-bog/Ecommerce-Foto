@extends('vendor.layout')

@section('content')
<div class="row">
    <div class="col">
        <div class="page-description d-flex align-items-center">
            <div class="page-description-content flex-grow-1">
                <h1>Ubah Password</h1>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('/vendor/doUbahPassword') }}" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="password">Password Lama</label>
                        <input type="password" class="form-control" name="old_password" value="{{ old('old_password') }}" placeholder="Password Lama">
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Password Baru</label>
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password Baru">
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Konfirmasi Password Baru">
                        @if ($errors->has('password_confirmation'))
                            <span class="invalid feedback"role="alert">
                                <strong>{{ $errors->first('password_confirmation') }}.</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection