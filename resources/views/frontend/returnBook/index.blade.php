@extends('layouts.mainLayout')

@section('title', 'Pengembalian Buku')

@section('head')

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Add New Book</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.bookLoan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Select User -->
                            <div class="mb-3">
                                <label for="user_id" class="form-label">Choose User</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="">Select User</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Select Book -->
                            <div class="mb-3">
                                <label for="book_id" class="form-label">Choose Book</label>
                                <select name="book_id" id="book_id" class="form-control">
                                    <option value="">Select Book</option>
                                    @foreach ($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->book_code }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Add Book</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
