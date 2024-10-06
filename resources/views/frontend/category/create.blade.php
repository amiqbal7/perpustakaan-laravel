@extends('layouts.mainLayout')

@section('content')
    <div class="container-fluid mt-5">

        <h1 class="h3 mb-2 text-gray-800">Kategori</h1>
        <div class="row ">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Kategori</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Name Category -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <!-- Submit Button -->
                            <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
