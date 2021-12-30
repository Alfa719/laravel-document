@extends('layouts.app')
@section('style', '#1b1131')
@section('content')
    <div class="container-fluid mx-5 mt-5 pt-5">
        <div class="row">
            <div class="col-md-4 ml-5 p-5 shadow-lg rounded bg-light" style="border-left: 4px solid rgb(11, 11, 68)">
                <img src="{{ asset('asset/img/product') . '/' . $product->thumbnail }}" class="img-fluid" alt="">
                <a href="{{ route('home') }}" class="btn btn-block btn-outline-primary">Back to
                    Home</a>
            </div>
            <div class="col-md-6 shadow-lg p-3 bg-light" style=" border-left: 4px solid rgb(11, 11, 68); color:black">
                <ul class=" text-capitalize">
                    <li class="mb-3">
                        <span>judul : {{ $product->title }}.</span>
                    </li>
                    <li class="mb-3">tipe produk :
                        <div class="badge badge-pill badge-primary text-uppercase">
                            {{ $product->type->type == null ? '' : $product->type->type }}</div>
                    </li>
                    <li class="mb-3">nama penulis : {{ $product->user->name }}</li>
                    <li class="mb-3">identitas penulis : {{ $product->user->level_user }}</li>
                    <li class="mb-3">Tahun Penulisan :
                        {{ $product->tahun }}
                    </li>
                    <li class="mb-3">Terakhir di Update :
                        {{ $product->updated_at == null ? 'Unknown' : $product->created_at->diffForHumans() }}
                    </li>
                </ul>
                <div class="btn btn-success text-capitalize ml-3">
                    <a href="{{ route('download.product', $product->title) }}" style="color: whitesmoke">
                        Download File
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
