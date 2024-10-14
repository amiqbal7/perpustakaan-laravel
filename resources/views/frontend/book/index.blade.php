@section('title', 'Daftar Buku')

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
    <h1 class="h3 mb-2 text-gray-800">Daftar Buku</h1>
    <p class="mb-4">Here is the list of books displayed in a table.</p>

    <!-- Add New Book Button and Search Form -->
    <div class="d-flex justify-content-between mb-4">
        @if (auth()->user()->role_id == 1)
            <!-- Add New Book Button -->
            <a href="{{ route('admin.books.create') }}" class="btn btn-primary">Tambahkan Buku</a>
        @endif

        <!-- Search Form -->
        <form class="form-inline" method="GET" action="{{ route('admin.books.search') }}">
            <div class="input-group">
                <input type="text" name="search" class="form-control bg-white border small"
                    placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2"
                    value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Books List as Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Cover</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Kode Buku</th>
                    <th>Status</th>
                    <th>Jumlah</th>
                    @if (auth()->user()->role_id == 1)
                        <th>Aksi</th>
                    @endif

                </tr>
            </thead>
            <tbody>
                @foreach ($books as $index => $book)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img class="img-thumbnail" src="{{ Storage::url($book->cover_image) }}" alt="Book Cover"
                                style="height: 100px; width: 100px; object-fit: cover;">
                        </td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->book_code }}</td>
                        <td>
                            <span class="badge {{ $book->status == 'in stock' ? 'bg-success' : 'bg-danger' }}">
                                {{ $book->status }}
                            </span>
                        </td>
                        <td>{{ $book->quantity }}</td>
                        @if (auth()->user()->role_id == 1)
                            <td>
                                <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-end">
        {{ $books->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
