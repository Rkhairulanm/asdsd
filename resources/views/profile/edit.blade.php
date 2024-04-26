@extends('main')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <div class="col-12">
        <div class="card rounded">
            <div class="d-flex justify-content-between m-3">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card rounded">
            <div class="d-flex justify-content-between m-3">
                @include('profile.partials.update-password-form')
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card rounded">
            <div class="d-flex justify-content-between m-3">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
    <br>
    <a href="/" class="mt-3 flex items-center">
        <x-danger-button class="ms-3">
            <i class="fas fa-arrow-left mr-2"></i> {{ __('Back') }}
        </x-danger-button>
    </a>
    </div>
@endsection
