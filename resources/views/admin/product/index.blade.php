@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: black">Data Product</h1>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-light shadow-sm components-section">
                    <div class="card card-body border-light shadow-sm table-wrapper table-responsive pt-0">
                        <x-alert></x-alert>
                        <br>
                        <table class="table table-striped crud-table shadow-lg">
                            <thead style="background:  rgb(4, 14, 58); color: whitesmoke;" class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Thumb</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Author</th>
                                    <th>Year</th>
                                    <th>Upload At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="background: whitesmoke; color: black">
                                @foreach ($product as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <img class="img-profile rounded-circle"
                                                src="{{ asset('asset/img/product') . '/' . $item->thumbnail }}"
                                                height="40" width="40">
                                        </td>
                                        <td style="width: 200px">{{ $item->title }}</td>
                                        <td>{{ $item->type->type }}</td>
                                        <td>
                                            {{ $item->user_id == null ? 'Unknown' : $item->user->name }}</td>
                                        <td>{{ $item->tahun }}</td>
                                        <td>{{ $item->created_at->diffForHumans() }}</td>
                                        <td style="min-width: 200px">
                                            <a href="{{ url('/admin/data-product/') . '/' . $item->id }}"
                                                class="badge badge-warning badge-pill py-2 px-4 badge-dosen shadow-sm text-dark">Edit</a>
                                            <form class="d-inline"
                                                action="{{ route('admin.product.delete', [$item->id]) }}" method="POST">
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
                            {{ $product->links() }}
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
