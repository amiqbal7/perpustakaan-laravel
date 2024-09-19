@extends('layouts.mainLayout')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Peminjaman Buku.</h1>
        <p class="mb-4">DataTables is a third-party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
                DataTables documentation</a>.</p>

        <!-- Card for User and Book Selection -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
            </div>

            <div class="card-body">
                <!-- Form for selecting user and book -->
                <form action="{{ route('admin.bookLoan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Select User -->
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Choose User</label>
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="" disabled selected>Select User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Select Book -->
                    <div class="mb-3">
                        <label for="book_id" class="form-label">Choose Book</label>
                        <select name="book_id" id="book_id" class="form-control">
                            <option value="" disabled selected>Select Book</option>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->book_code }} - {{ $book->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-3 text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
