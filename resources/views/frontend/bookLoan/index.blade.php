@extends('layouts.mainLayout')

@section('title', 'Summary')

@section('head')

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Peminjaman Buku.</h1>
        <p class="mb-4">DataTables is a third-party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official
                DataTables documentation</a>.</p>

        <!-- Card for User and Book Selection -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Peminjaman Buku</h6>
            </div>

            <div class="card-body">
                <!-- Form for selecting user and book -->
                <form action="{{ route('admin.bookLoan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Select User -->
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Daftar Pengguna</label>
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="" disabled selected>Pilih Pengguna</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Select Book -->
                    <div class="mb-3">
                        <label for="book_id" class="form-label">Daftar Buku</label>
                        <select name="book_id" id="book_id" class="form-control">
                            <option value="" disabled selected>Pilih Buku</option>
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
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

    </div>
@endsection
