@extends('layouts.admin')
@section('content')
    @isset($type)
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0" style="color : black">Update Program</h1>
            </div>
            <div class="row">
                <div class="col-md-8 mx-auto mb-4">
                    <div class="card border-light shadow-sm components-section px-4 py-3">
                        <form action="{{ route('admin.type.edit', $type->id) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="rounded-lg p-5" style="background: white; color:black">
                                <div class="form-group">
                                    <label for="nama">Type</label>
                                    <input type="text" name="type" class="form-control text-capitalize"
                                        value="{{ $type->type }}">
                                    @error('type')
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
                <h1 class="h3 mb-0" style="color : black">Add Type</h1>
            </div>
            <div class="row">
                <div class="col-md-8 mx-auto mb-4">
                    <div class="card border-light shadow-sm components-section px-4 py-3">
                        <form action="{{ route('admin.type.add') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="rounded-lg p-5" style="background: white; color:black">
                                <div class="form-group">
                                    <label for="nama">New Type</label>
                                    <input type="text" name="type" class="form-control text-capitalize">
                                    @error('type')
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
