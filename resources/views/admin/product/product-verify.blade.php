@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: black">Verifikasi Produk</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-light shadow-sm components-section">
                    <div class="card card-body border-light shadow-sm table-wrapper table-responsive pt-0">
                        <x-alert></x-alert>
                        <br>
                        <table class="table table-striped crud-table shadow-lg text-center">
                            <thead style="background: rgb(4, 14, 58); color: whitesmoke;" class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Thumb</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="background: whitesmoke; color: black" class="text-capitalize">
                                @foreach ($products as $p)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td style="width: 50px">
                                            <img class="img-profile rounded-circle"
                                                src="{{ asset('asset/img/product') . '/' . $p->thumbnail }}" height="40"
                                                width="40">
                                        </td>
                                        <td style="width: 320px">{{ $p->title }}
                                        </td>
                                        <td style="width: 200px">
                                            {{ $p->user->name }}
                                            <span class="badge py-2 px-3 mx-2 shadow-sm"
                                                style="background: yellow">{{ $p->user->level_user }}</span>
                                        </td>
                                        <td>
                                            {{ $p->updated_at == null ? 'Unknown' : $p->created_at->format('d F, Y') }}
                                            <br>
                                            <span class="badge py-2 px-3 mx-2 shadow-sm"
                                                style="background: yellow">{{ $p->updated_at == null ? 'Unknown' : $p->created_at->diffForHumans() }}</span>
                                        </td>
                                        <td style="min-width: 250px; max-width:300px;">
                                            <form action="{{ url('/admin/verify-product') . '/' . $p->id }}" method="post"
                                                class="form-group">
                                                @method('PUT')
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <select name="type_id" id="" class="form-control shadow-sm"
                                                            style="border: 1px solid rgb(0, 4, 255); color: black">
                                                            @foreach ($type as $item)
                                                                <option value="{{ $item->id }}">{{ $item->type }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="submit" value="Verifikasi"
                                                            class="btn btn-primary shadow-sm">
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="ml-auto px-2 py-2 shadow-lg" style="background: blue; color:black;">
                            {{ $products->links() }}
                        </div>
                    </div>
                    <footer class="footer section">
                </div>
            </div>
        </div>
    </div>
@endsection
