@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color : black">Update Product</h1>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto mb-4">
                <div class="card border-light shadow-sm components-section p-5"
                    style="color: black;background: linear-gradient(to bottom, #2c3e50, #3498db)">
                    <form action="{{ url('/admin/data-product/edit-product') . '/' . $product->id }}" method="post"
                        class="" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="shadow-lg rounded-lg p-5" style="background: white">
                            <div class="form-group">
                                <label for="gambar">Thumbnail Product</label><br>
                                <img src="{{ asset('asset/img/product') . '/' . $product->thumbnail }}" alt=""
                                    height="100" width="100" class="shadow-lg"><br><br>
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
                                <input type="text" name="title" class="form-control" value="{{ $product->title }}">
                                @error('title')
                                    <div class="text-danger">
                                        <strong>
                                            <small>{{ $message }}</small>
                                        </strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="prodi">Product Type </label>
                                <select name="type_id" id="" class="form-control">
                                    @foreach ($type as $t)
                                        <option value="{{ $t->id }}"
                                            {{ $product->type_id == $t->id ? 'selected' : '' }}>{{ $t->type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" name="user_id" class="form-control" value="{{ $product->user->name }}"
                                    disabled>
                                @error('user_id')
                                    <div class="text-danger">
                                        <strong>
                                            <small>{{ $message }}</small>
                                        </strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tahun">Year</label>
                                <input type="number" name="tahun" id="tahun" class="form-control"
                                    value="{{ $product->tahun }}">
                                @error('tahun')
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
@endsection
