@extends('main')
@section('content')
    <div class="container mt-6">
        <div class="row">
            <div class="col-lg-8">
                <div class="card rounded x">
                    <div class="m-3">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Profile Information
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                Update your account's profile information and email address.
                            </p>
                        </header>

                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <form method="post" action="{{ route('profile.update') }}" class="mt-6">
                            @csrf
                            @method('patch')

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" required autocomplete="email">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                    <div>
                                        <p class="text-sm mt-2 text-gray-800">
                                            Your email address is unverified.
                                            <button type="submit" form="send-verification"
                                                class="btn btn-link text-decoration-none">
                                                Click here to re-send the verification email.
                                            </button>
                                        </p>

                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-medium text-sm text-success">
                                                A new verification link has been sent to your email address.
                                            </p>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                @if (session('status') === 'profile-updated')
                                    <p class="text-success">Saved.</p>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card rounded x">
                    <div class="m-3">
                        <!-- Update Password Section -->
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Update Password
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                Ensure your account is using a long, random password to stay secure.
                            </p>
                        </header>

                        <form method="post" action="{{ route('password.update') }}" class="mt-6">
                            @csrf
                            @method('put')

                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input type="password" id="current_password" name="current_password" class="form-control"
                                    autocomplete="current-password">
                                @error('current_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- New Password and Confirm Password fields -->
                            <!-- Add your code here -->

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                @if (session('status') === 'password-updated')
                                    <p class="text-success">Saved.</p>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card rounded x">
                    <div class="m-3">
                        <!-- Delete Account Section -->
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Delete Account
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                Once your account is deleted, all of its resources and data will be permanently deleted.
                                Before
                                deleting your account, please download any data or information that you wish to retain.
                            </p>
                        </header>

                        <form method="post" action="{{ route('profile.destroy') }}" class="mt-6">
                            @csrf
                            @method('delete')

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    autocomplete="current-password">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-danger">Delete Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-3 pb-3">
            <a href="/" class="btn btn-danger">
                <i class="fas fa-arrow-left me-2"></i> Back
            </a>
        </div>
    </div>
@endsection
