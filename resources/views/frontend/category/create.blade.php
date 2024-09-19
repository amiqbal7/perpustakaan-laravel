@extends('layouts.mainLayout')

@section('content')
    <div class="container mt-5">

        <h1>Add New Category</h1> <!-- Only wrap the title inside the h1 tag -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Add New Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Name Category -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name Category</label>
                                <input type="text" class="form-control" id="name" name="name" required>
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
