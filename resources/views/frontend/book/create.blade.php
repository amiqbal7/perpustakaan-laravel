@extends('layouts.mainLayout')

@section('content')
    <div class="container mt-5">

        <h1>Add New Book</h1> <!-- Only wrap the title inside the h1 tag -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Add New Book</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Book Code -->
                            <div class="mb-3">
                                <label for="book_code" class="form-label">Book Code</label>
                                <input type="text" class="form-control" id="book_code" name="book_code" required>
                            </div>

                            <!-- Title -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>

                            <!-- Writer Name -->
                            <div class="mb-3">
                                <label for="author" class="form-label">Penulis</label>
                                <input type="text" class="form-control" id="author" name="author" required>
                            </div>

                            <!-- Cover Image -->
                            <div class="mb-3">
                                <label for="cover_image" class="form-label">Gambar Sampul</label>
                                <input type="file" class="form-control" id="cover_image" name="cover_image"
                                    accept="image/*">
                            </div>

                            <select name="category_id" id="category_id"
                                class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                                <option value="">Choose city</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

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
