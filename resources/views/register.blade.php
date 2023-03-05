@extends('layout')

@section('content')

<section class="man-banner spad">
  <div class="container-fluid">
      <div class="row">
            <div class="col-md-4"></div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <center><h3>Register</h3></center>

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif


                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        <form action="{{ url('/doRegister') }}" method="post">
                            @csrf
                            <br>
                            <div class="form-row">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <br>
                            <div class="form-row">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <br>
                            <div class="form-row">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <br>
                            <div class="form-row">
                                <button type="submit" class="btn btn-primary col-md-12" style="background-color:#e7ab3c;border: 1px solid #e7ab3c;">Register</button>
                            </div>
                        </form>
                        <br>
                        <div class="form-row">
                            <a href="{{ url('') }}" class="btn btn-primary col-md-12" style="background-color:black;border: 1px solid black;color:white;">Home</a>

                        </div>
                    </div>
                </div>
            </div>
      </div>
  </div>
</section>
@endsection