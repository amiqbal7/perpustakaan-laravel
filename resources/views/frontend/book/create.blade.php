@extends('layouts.mainLayout')

@section('title', 'Buku')

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
    <div class="container mt-5">

        <h1>Tambah Buku Baru</h1> <!-- Judul dalam bahasa Indonesia -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Buku Baru</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Kode Buku -->
                            <div class="mb-3">
                                <label for="book_code" class="form-label">Kode Buku</label>
                                <input type="text" class="form-control" id="book_code" name="book_code" required>
                            </div>

                            <!-- Judul -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>

                            <!-- Nama Penulis -->
                            <div class="mb-3">
                                <label for="author" class="form-label">Penulis</label>
                                <input type="text" class="form-control" id="author" name="author" required>
                            </div>

                            <!-- Gambar Sampul -->
                            <div class="mb-3">
                                <label for="cover_image" class="form-label">Gambar Sampul</label>
                                <input type="file" class="form-control" id="cover_image" name="cover_image"
                                    accept="image/*">
                            </div>

                            <!-- Jumlah -->
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Jumlah</label>
                                <input type="text" class="form-control" id="quantity" name="quantity" required>
                            </div>

                            <!-- Pilih Kategori -->
                            <select name="category_id" id="category_id"
                                class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                            <!-- Tombol Kirim -->
                            <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
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
