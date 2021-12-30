@extends('layouts.app')
@section('style', 'rgba(245, 245, 245, 0.753)')
@section('content')
    <div class="jumbotron py-5" style="margin-top: 40px; height: 60vh; color: white; background-color: #460a0a;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 d-none d-md-inline-block">
                    <img src="{{ asset('asset/img/web/beranda.svg') }}" width="350" alt="">
                </div>
                <div class="col-md-8 pb-3">
                    <div class="content">
                        <h2>Selamat Datang Di Produk UNUJA</h2>
                        <br>
                        <p class="text-justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse nisi nam
                            voluptates explicabo suscipit amet quidem perferendis. Voluptas et quibusdam voluptate soluta
                            id, non adipisci qui aspernatur nesciunt doloribus, vel ea quod dolores harum, fuga totam?
                            Voluptatum, laborum fuga. Aliquam?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="{{ route('search.product') }}" class="input-group shadow-sm rounded" method="get"
            style="border-left: 3px solid rgb(12, 12, 63); ">
            <input type="search" name="search" id="keyword" class="form-control text-capitalize"
                placeholder="cari produk berdasarkan judul, penulis, tahun, tipe" value="{{ old('search') }}">
            <div class="input-group-prepend">
                <button type="submit" class="btn btn-primary">search</button>
            </div>
        </form>
    </div>

    <!-- card -->
    <div class="container mt-5">
        <div class="row">
            @foreach ($allProduct as $product)
                <div class="col-md-3 mb-3">
                    <div class="card shadow-lg rounded p-3" style="border-left: 3px solid blue">
                        <img src="{{ asset('asset/img/product') . '/' . $product->thumbnail }}" alt=""
                            class="card-img-top shadow-sm" height="200" style="max-height: 300px">
                        <div class="card-body" style="min-height: 250px; height:300px">
                            <h5 class="card-title text-capitalize"><a
                                    href="{{ url('asset/product') . '/' . $product->title }}"
                                    target="_blank">{{ $product->title }}</a>
                            </h5>
                            <p class="mt-n3" style="color: black">
                                {{ $product->created_at == null ? 'Unknown' : $product->created_at->diffForHumans() }}</p>
                            <div class="badge badge-primary text-uppercase px-2 my-2">{{ $product->type->type }}</div><br>
                            <div class="badge badge-success text-capitalize p-2"><a
                                    href="{{ route('download.product', $product->title) }}"
                                    style="color: whitesmoke">Download File</a></div>
                            <br>
                            <a href="{{ url('product') . '/' . $product->id }}" class="btn btn-outline-primary mt-2">Show
                                Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
