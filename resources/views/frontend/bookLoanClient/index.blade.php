@extends('layouts.mainLayout')

@section('title', 'Pinjaman Buku')

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
    <h1>Daftar Buku yang Dipinjam</h1>

    <!-- Cek apakah ada buku yang dipinjam -->
    @if ($borrowedBooks->isEmpty())
        <p>Kamu belum meminjam buku apapun.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Harus Kembali</th>
                    <th>Tanggal Pengembalian</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrowedBooks as $index => $loan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $loan->books->title }}</td> <!-- Asumsi field judul buku adalah 'title' -->
                    <td>{{ $loan->loan_date }}</td>
                    <td>{{ $loan->return_date }}</td>
                    <td>
                        @if ($loan->actual_return_date)
                            {{ $loan->actual_return_date }}
                        @else
                            Belum Dikembalikan
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
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


