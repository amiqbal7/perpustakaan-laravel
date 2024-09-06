@extends('layouts.mainLayout')

@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Users</h1>
<div><a href="{{ route('admin.books.create') }}" class="btn btn-primary">Add New Book</a>
    <p class="mb-4">DataTables is a third-party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official
            DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Kode buku</th>
                            <th>Cover</th>
                            <th>Penulis</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $loop->iteration }}
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->book_code }}</td>
                                <td><img class=" w-25" src="{{ Storage::url($book->cover_image) }}" alt="Book Cover" /></td>

                                <td>{{ $book->writer_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-end">
                {{ $books->links('pagination::bootstrap-4') }}
            </div>
        </div>

    </div>
@endsection
