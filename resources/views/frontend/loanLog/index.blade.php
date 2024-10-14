@section('title', 'Log Peminjaman')

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
        <h1 class="h3 mb-2 text-gray-800">Log Peminjaman</h1> <!-- Page Heading -->

        <p class="mb-4">Pada page ini berisi daftar log peminjaman buku siswa.</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Log Peminjaman</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Peminjam</th>
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
                                    <td>{{ $log->actual_return_date }}</td>

                                    {{-- Tampilkan denda --}}
                                    <td class="text-danger font-bold">Rp. {{ number_format($log->fine, 0, ',', '.') }}</td>

                                    <td>
                                        <form action="{{ route('loan_logs.update', $log->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            @if (is_null($log->actual_return_date))
                                                <button type="submit"
                                                    class="bg-success p-2 rounded-sm border-0 text-white">
                                                    Dikembalikan
                                                </button>
                                            @else
                                                <button disabled class="bg-secondary p-2 rounded-sm border-0 text-white">
                                                    Sudah Dikembalikan
                                                </button>
                                            @endif
                                        </form>

                                    </td>
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
