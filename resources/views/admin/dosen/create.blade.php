@extends('layouts.admin')
@section('content')
    @isset($user)
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0" style="color : black">Update Dosen</h1>
            </div>
            <div class="row">
                <div class="col-md-8 mx-auto mb-4">
                    <div class="card border-light shadow-sm components-section p-5">
                        <form action="{{ url('/admin/data-dosen/edit-dosen') . '/' . $user->nomor_induk }}" method="post"
                            class="">
                            @method('PUT')
                            @csrf
                            <div class="rounded-lg p-5" style="background: white; color:black">
                                <div class="form-group">
                                    <label for="nidn">NIDN</label>
                                    <input type="number" name="nomor_induk" class="form-control" disabled
                                        value="{{ $user->nomor_induk }}">
                                    <div class="text-danger">
                                        <strong>
                                            <small>NIDN Tidak bisa di ganti.</small>
                                        </strong>
                                    </div>
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
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                    @error('name')
                                        <div class="text-danger">
                                            <strong>
                                                <small>{{ $message }}</small>
                                            </strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label><br>
                                    <input type="radio" name="gender" value="Laki-Laki"
                                        {{ $user->gender == 'Laki-Laki' ? 'checked' : '' }}> Laki-Laki
                                    <input type="radio" name="gender" value="Perempuan"
                                        {{ $user->gender == 'Perempuan' ? 'checked' : '' }}> Perempuan
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
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
                                    <textarea name="address" id="address" cols="30" rows="3"
                                        class="form-control">{{ $user->address }}</textarea>
                                    @error('address')
                                        <div class="text-danger">
                                            <strong>
                                                <small>{{ $message }}</small>
                                            </strong>
                                        </div>
                                    @enderror
                                </div>
                                <input type="submit" class="btn btn-outline-info btn-block" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0" style="color: black">Add Dosen</h1>
            </div>
            <div class="row">
                <div class="col-md-8 mb-4 mx-auto">
                    <div class="card border-light shadow-sm components-section p-5">
                        <form action="{{ url('/admin/data-dosen/add-dosen') }}" method="post" class="bg-light rounded">
                            @csrf
                            <div class="rounded-lg p-5">
                                <div class="form-group">
                                    <label for="nidn">NIDN</label>
                                    <input type="number" name="nomor_induk" class="form-control">
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
                                    <input type="text" name="name" class="form-control">
                                    @error('name')
                                        <div class="text-danger">
                                            <strong>
                                                <small>{{ $message }}</small>
                                            </strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label><br>
                                    <input type="radio" name="gender" value="Laki-Laki" checked> Laki-Laki
                                    <input type="radio" name="gender" value="Perempuan"> Perempuan
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control">
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
                                    <textarea name="address" id="address" cols="30" rows="3" class="form-control"></textarea>
                                    @error('address')
                                        <div class="text-danger">
                                            <strong>
                                                <small>{{ $message }}</small>
                                            </strong>
                                        </div>
                                    @enderror
                                </div>
                                <input type="submit" class="btn btn-outline-info btn-block" value="Insert">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endisset
@endsection
