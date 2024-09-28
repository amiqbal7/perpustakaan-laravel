@extends('layouts.mainLayout')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Detail Users</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Loan Logs</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Buku Dipinjam</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Harus Kembali</th>
                                <th>Tanggal Kembali</th>
                                <th>Denda</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($loan_logs as $log)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $log->users->name }}</td>
                                    <td>{{ $log->books->title }}</td>
                                    <td>{{ $log->loan_date }}</td>
                                    <td>{{ $log->return_date }}</td>
                                    <td>{{ optional($log->actual_return_date)->format('Y-m-d') ?? 'Not returned yet' }}</td>
                                    <td>Rp.3473848</td>
                                    <td><button class="bg-success p-2 rounded-sm border-0 text-white">Dikembalikan</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-end">
                    {{ $loan_logs->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
