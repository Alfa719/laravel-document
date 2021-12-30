@extends('layouts.admin')
@section('content')
    @isset($prodi)
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0" style="color : black">Update Program</h1>
            </div>
            <div class="row">
                <div class="col-md-8 mx-auto mb-4">
                    <div class="card border-light shadow-sm components-section p-5"
                        style="color: black; background: linear-gradient(to bottom, #2c3e50, #3498db)">
                        <form action="{{ url('/admin/program-study/edit-program/') . '/' . $prodi->id }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="shadow-lg rounded-lg p-5" style="background: white">
                                <div class="form-group">
                                    <label for="gambar">Logo Program</label><br>
                                    <img src="{{ asset('asset/img/prodi') . '/' . $prodi->image }}" alt="" width="100"
                                        height="100"><br>
                                    <input type="file" name="image" id="gambar" class="form-control shadow-sm mb-2">
                                    @error('logo')
                                        <div class="text-danger">
                                            <strong>
                                                <small>{{ $message }}</small>
                                            </strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama">Program</label>
                                    <input type="text" name="nama_prodi" class="form-control text-capitalize"
                                        value="{{ $prodi->nama_prodi }}">
                                    @error('nama_prodi')
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
                <h1 class="h3 mb-0" style="color : black">Add Program Study</h1>
            </div>
            <div class="row">
                <div class="col-md-8 mx-auto mb-4">
                    <div class="card border-light shadow-sm components-section p-5"
                        style="color: black; background: linear-gradient(to bottom, #2c3e50, #3498db)">
                        <form action=" {{ route('admin.prodi.add') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="shadow-lg rounded-lg p-5" style="background: white">
                                <div class="form-group">
                                    <label for="gambar">Logo Program</label><br>
                                    <input type="file" name="image" id="gambar" class="form-control shadow-sm mb-2">
                                    @error('logo')
                                        <div class="text-danger">
                                            <strong>
                                                <small>{{ $message }}</small>
                                            </strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama">Program</label>
                                    <input type="text" name="nama_prodi" class="form-control">
                                    @error('nama_prodi')
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
