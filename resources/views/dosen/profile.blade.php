@extends('layouts.app')
@section('style', '#1b1131')
@section('content')

    <div class="container-fluid mt-5 p-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-lg p-5" style="background: rgb(211, 212, 218)">
                    <img src="{{ asset('asset/img/user') . '/' . $dosen->image }}" class="card-img-top" alt="...">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow-lg mb-4">
                    <center>
                        <h2 class="text-capitalize py-2" style="color: black">My Profile</h2>
                    </center>
                </div>
                <div class="card shadow-lg pb-4 mt-4" style="border-left: 4px solid rgb(6, 6, 138)">
                    <ul class="text-capitalize mt-3 px-5">
                        <li class="mb-3">
                            <span>NIDN : {{ $dosen->nomor_induk }}</span>
                        </li>
                        <li class="mb-3">Nama : {{ $dosen->name }}</li>
                        <li class="mb-3">jenis kelamin : {{ $dosen->gender }}</li>
                        <li class="mb-3">alamat : {{ $dosen->address }}</li>
                        <li class="mb-3">jumlah produk :
                            <a href="#product" class="btn btn-primary btn-sm">
                                Product <span class="badge badge-light">{{ $dosenProduct->count() }}</span>
                                <span class="sr-only">unread messages</span>
                            </a>
                        </li>
                        <li class="mb:3">Level User :
                            <h4 class="badge badge-primary px-3 py-2">
                                {{ $dosen->level_user }}
                            </h4>
                        </li>
                    </ul>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6 my-2">
                        <a href="{{ route('home') }}" class="btn btn-warning btn-block font-weight-bold"
                            style="color: black">Dashboard</a>
                    </div>
                    <div class="col-md-6 my-2">
                        <button data-target="#modalBiodata" data-toggle="modal"
                            class="btn btn-info font-weight-bold btn-block" style="color: black">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <center>
                    <h2 id="product" class="text-center text-light">My Product</h2>
                    <hr style="width: 400px; border: 2px solid rgb(57, 248, 255); border-radius: 2px;">
                </center>
            </div>
            @foreach ($dosenProduct as $product)
                <div class="col-md-3 my-3">
                    <div class="card shadow-lg rounded">
                        <img src="{{ asset('asset/img/product') . '/' . $product->thumbnail }}" alt=""
                            class="card-img-top shadow-sm" height="200" style="max-height: 300px">
                        <div class="card-body">
                            <h5 class="card-title text-capitalize">
                                <a href="{{ url('asset/product') . '/' . $product->title }}"
                                    target="_blank">{{ $product->title }}</a>
                            </h5>
                            <p class="mt-n3">2021</p>
                            <div class="badge badge-primary text-uppercase">{{ $product->type->type }}</div><br>
                            <a href="{{ url('/dosen') . '/' . $product->id . '/product' }}"
                                class="btn btn-outline-primary mt-2">Show Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Modal Biodata-->
    <div class="modal fade" id="modalBiodata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Details Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('dosen.profile.update', $dosen->nomor_induk) }}" method="post"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body" style="color: black">
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="number" name="nomor_induk" class="form-control" id="nim"
                                value="{{ $dosen->nomor_induk }}" disabled>
                            @error('nomor_induk')
                                <div class="text-danger">
                                    <strong>
                                        <small>{{ $message }}</small>
                                    </strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $dosen->name }}">
                            @error('name')
                                <div class="text-danger">
                                    <strong>
                                        <small>{{ $message }}</small>
                                    </strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenkel">Jenis Kelamin</label><br>
                            <input type="radio" name="gender" id="gender" value="Laki-Laki"
                                {{ $dosen->gender == 'Laki-Laki' ? 'checked' : '' }}>Laki-Laki
                            <input type="radio" name="gender" id="gender" value="Perempuan"
                                {{ $dosen->gender == 'Perempuan' ? 'checked' : '' }}>Perempuan
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $dosen->email }}">
                            @error('email')
                                <div class="text-danger">
                                    <strong>
                                        <small>{{ $message }}</small>
                                    </strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea name="address" id="address" cols="30" rows="2"
                                class="form-control">{{ $dosen->address }}</textarea>
                            @error('address')
                                <div class="text-danger">
                                    <strong>
                                        <small>{{ $message }}</small>
                                    </strong>
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="gambar">Gambar</label>
                            <center>
                                <img src="{{ asset('asset/img/user') . '/' . $dosen->image }}" alt="" height="100"
                                    width="100">
                            </center>
                            <input type="file" name="image" id="gambar">
                            @error('image')
                                <div class="text-danger">
                                    <strong>
                                        <small>{{ $message }}</small>
                                    </strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Change Password</label>
                            <input type="password" name="password" class="form-control" id="password">
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
                            <input type="password" name="password_confirmation" class="form-control"
                                id="password_confirmation">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
