@extends('layouts.app')
@section('style', '#1b1131')
@section('content')
    <div class="container-fluid mx-5 mt-5 pt-2">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card border-light shadow-sm components-section p-5"
                    style="color: black; background :rgb(235, 229, 229)">
                    <form action="{{ route('upload.product', $user->nomor_induk) }}" method="post" class=""
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 shadow-lg rounded-lg p-5" style="background: white">
                            <div class="form-group">
                                <label for="gambar">Thumbnail Product</label><br>
                                <input type="file" name="thumbnail" id="gambar" class="form-control shadow-sm mb-2">
                                @error('thumbnail')
                                    <div class="text-danger">
                                        <strong>
                                            <small>{{ $message }}</small>
                                        </strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama">Title</label>
                                <input type="text" name="title" class="form-control">
                                @error('title')
                                    <div class="text-danger">
                                        <strong>
                                            <small>{{ $message }}</small>
                                        </strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tahun">Year</label>
                                <input type="number" name="tahun" id="tahun" class="form-control">
                                @error('tahun')
                                    <div class="text-danger">
                                        <strong>
                                            <small>{{ $message }}</small>
                                        </strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gambar">Upload Product File</label><br>
                                <input type="file" name="file_product" id="gambar" class="form-control shadow-sm mb-2">
                                @error('file_product')
                                    <div class="text-danger">
                                        <strong>
                                            <small>{{ $message }}</small>
                                        </strong>
                                    </div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-outline-info btn-block" value="Upload Product">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
