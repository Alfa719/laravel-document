@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: black">Data Mahasiswa</h1>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-light shadow-sm components-section">
                    <div class="card card-body border-light shadow-sm table-wrapper table-responsive pt-0">
                        <x-alert></x-alert>
                        <a class="badge py-3 mt-2 shadow-lg" style="background: rgb(0, 38, 255);color:white; width:50px"
                            href="{{ route('admin.mahasiswa.add') }}"><i class="fas fa-plus"></i></a>
                        <br>
                        <table class="table table-striped crud-table shadow-lg">
                            <thead style="background: rgb(4, 14, 58); color: whitesmoke;" class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>NIM</th>
                                    <th>Name</th>
                                    <th>Program</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="background: whitesmoke; color: black">
                                @foreach ($mahasiswa as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <img class="img-profile rounded-circle"
                                                src="{{ asset('asset/img/user') . '/' . $item->image }}" height="40"
                                                width="40">
                                        </td>
                                        <td>{{ $item->nomor_induk }}</td>
                                        <td style="max-width: 300px; min-width:200px">{{ $item->name }}</td>
                                        <td>{{ $item->prodi_id == null ? 'Unknown' : $item->prodi->nama_prodi }}
                                        </td>
                                        <td>{{ $item->address }}</td>
                                        <td style="max-width: 200px">{{ $item->email }}</td>
                                        <td style="min-width: 200px">
                                            <a href="{{ url('/admin/data-mahasiswa/edit-mahasiswa') . '/' . $item->nomor_induk }}"
                                                class="badge badge-warning badge-pill py-2 px-4 badge-dosen shadow-sm text-dark m-1 ">Edit</a>
                                            <form class="d-inline"
                                                action="{{ route('admin.mahasiswa.delete', [$item->nomor_induk]) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" id="deleteButton"
                                                    class="badge badge-danger badge-pill py-2 px-4 badge-dosen shadow-sm"
                                                    style="border:none">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="ml-auto px-2 py-2 shadow-lg" style="background: blue; color:black;">
                            {{ $mahasiswa->links() }}
                        </div>
                    </div>
                    <footer class="footer section py-2">
                </div>
            </div>
        </div>
    </div>
@endsection
