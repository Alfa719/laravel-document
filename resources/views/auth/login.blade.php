@extends('layouts.style')
@extends('layouts.script')

<body style="background-color: #0b102e;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto mt-5 bg-light px-5 py-3 shadow-lg rounded-lg" style="color: black">
                <center>
                    <img src="{{ asset('asset/img/web/logo-UNUJA.png') }}" alt="" class="rounded-circle" height="100"
                        width="100">
                </center>
                <br>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control @error('nomor_induk') is-invalid @enderror"
                            name="nomor_induk" value="{{ old('username') }}">
                        @error('nomor_induk ')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" id="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
