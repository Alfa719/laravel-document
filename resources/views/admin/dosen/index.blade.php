@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: black">Data Dosen</h1>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-light shadow-sm components-section">
                    <x-alert></x-alert>
                    <div class="card card-body border-light shadow-lg table-wrapper table-responsive pt-0">
                        <a class="badge py-3 mt-2 shadow-lg" style="background: rgb(0, 38, 255);color:white; width:50px"
                            href="{{ route('admin.dosen.add') }}"><i class="fas fa-plus"></i></a>
                        <br>
                        <table class="table table-striped crud-table shadow-lg">
                            <thead style="background:  rgb(4, 14, 58); color: whitesmoke;" class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>NIDN</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Email Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="background: whitesmoke; color: black">
                                @foreach ($dosen as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <img class="img-profile rounded-circle"
                                                src="{{ asset('asset/img/user') . '/' . $item->image }}" height="40"
                                                width="40">
                                        </td>
                                        <td>{{ $item->nomor_induk }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->gender == 'Laki-Laki' ? 'L' : 'P' }}</td>
                                        <td style="width: 300px">{{ $item->address }}</td>
                                        <td style="max-width: 200px">{{ $item->email }}</td>
                                        <td style="width: 500px">
                                            <a href="{{ url('/admin/data-dosen/edit-dosen') . '/' . $item->nomor_induk }}"
                                                class="badge badge-warning badge-pill py-2 px-4 badge-dosen shadow-sm text-dark">Edit</a>
                                            <form class="d-inline"
                                                action="{{ route('admin.dosen.delete', $item->nomor_induk) }}"
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
                            {{ $dosen->links() }}
                        </div>
                    </div>
                    <footer class="footer section py-2">
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @section('scripting')
    <script type="text/javascript">
        $function() {
            // AJAX DataTable
            var datatable = $('.crud-table').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: "{{ route('admin.dosen') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'nomor_induk',
                        name: 'nomor_induk'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'emai',
                        name: 'email'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '15%'
                    },
                ]
            });
        }

    </script>
@endsection --}}
