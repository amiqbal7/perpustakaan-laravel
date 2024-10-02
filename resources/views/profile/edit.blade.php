@extends('layouts.mainLayout')

@section('content')
    <div class="container-fluid py-5">
               <div class="row">
            <div class="col-lg-8 offset-lg-2 space-y-4">
                <!-- Update Profile Information -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Update Password -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Delete Account -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
