@extends('layouts.mainLayout')

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
</div>
@endsection


