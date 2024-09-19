@extends('layouts.mainLayout')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Books List</h1>
        <p class="mb-4">Here is the list of books displayed as cards.</p>

        <!-- Add New Book Button and Search Form -->
        <div class="d-flex justify-content-between mb-4">
            @if (auth()->user()->role_id == 1)
                <!-- Add New Book Button -->
                <a href="{{ route('admin.books.create') }}" class="btn btn-primary">Add New Book</a>
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

        <!-- Books List as Cards -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($books as $book)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="row g-0 h-100">
                            <div class="col-md-4">
                                <img class="img-fluid rounded-start" src="{{ Storage::url($book->cover_image) }}" alt="Book Cover" style="height: 100%; object-fit: cover;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body d-flex flex-column">
                                    <p class="card-text text-white">
                                        <span class="badge {{ $book->status == 'in stock' ? 'bg-success' : 'bg-danger' }}">
                                            {{ $book->status }}
                                        </span>
                                    </p>
                                    <h5 class="card-title">{{ $book->title }}</h5>
                                    <p class="card-text">Author: {{ $book->author }}</p>
                                    <p class="card-text">Book Code: {{ $book->book_code }}</p>

                                    <!-- Edit Button (Visible only if role_id == 1) -->
                                    @if (auth()->user()->role_id == 1)
                                        <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-warning mt-auto">Edit</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        {{-- <div class="d-flex justify-content-end">
            {{ $books->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div> --}}
    </div>

    <!-- Custom CSS to ensure uniform card sizes -->

@endsection
