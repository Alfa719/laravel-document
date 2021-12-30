@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: black">Pengaturan Profil</h1>

        </div>
        <div class="row shadow-lg p-4 mb-4"
            style="border-radius: 10px; border-left:7px solid rgb(13, 13, 105); color: black; background:linear-gradient(to right, #12062e, #1f1c18, #12062e)">

            <div class="col-md-6 shadow-lg p-2 pr-5 rounded bg-light">
                <x-alert></x-alert>
                <form action="{{ route('admin.update', Auth::user()->nomor_induk) }}" method="post"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input type="text" class="form-control shadow-sm" id="name" value="{{ Auth::user()->name }}"
                            name="name">
                        @error('name')
                            <div class="text-danger">
                                <strong>
                                    <small>{{ $message }}</small>
                                </strong>
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="gambar">Profile Image</label><br>
                        <img src="{{ asset('asset/img/admin') . '/' . Auth::user()->image }}" alt="" height="100"
                            width="100" class="shadow-lg"><br><br>
                        <input type="file" name="image" id="gambar" class="form-control shadow-sm mb-2">
                        @error('image')
                            <div class="text-danger">
                                <strong>
                                    <small>{{ $message }}</small>
                                </strong>
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="gender">Gender</label><br>
                        <input type="radio" name="gender" id="gender" value="Laki-Laki"
                            {{ Auth::user()->gender == 'Laki-Laki' ? 'checked' : '' }}>Male
                        <input type="radio" name="gender" id="gender" value="Perempuan"
                            {{ Auth::user()->gender == 'Perempuan' ? 'checked' : '' }}>Female
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" cols="30" rows="3"
                            class="form-control shadow-sm">{{ Auth::user()->address }}</textarea>
                        @error('address')
                            <div class="text-danger">
                                <strong>
                                    <small>{{ $message }}</small>
                                </strong>
                            </div>
                        @enderror
                    </div>
            </div>
            <div class="col-md-6 shadow-lg pl-5 p-2 rounded bg-light">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control shadow-sm" id="username" name="nomor_induk"
                        value="{{ Auth::user()->nomor_induk }}">
                    @error('nomor_induk')
                        <div class="text-danger">
                            <strong>
                                <small>{{ $message }}</small>
                            </strong>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control shadow-sm" id="password" name="password">
                    @error('password')
                        <div class="text-danger">
                            <strong>
                                <small>{{ $message }}</small>
                            </strong>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control shadow-sm" id="password_confirmation"
                        name="password_confirmation">
                </div><br>
                <input type="submit" value="Update Profile" class="btn py-2 px-5"
                    style="background: rgb(55, 0, 255); color:white">
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection
