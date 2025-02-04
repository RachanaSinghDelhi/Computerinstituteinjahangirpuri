@php
    // Set banner image and breadcrumbs
    $bannerImage = asset('assets/images/Sliders_image/medal1_nice_computer_institute_jahangirpuri.jpg');
  
@endphp
@extends('layout.app')

@section('title', 'Contact Us')
@section('content')

<div class="container mt-5">
        <h1 class="text-center">Contact Us</h1>
        <p class="text-center">Discover a world of possibilities in technology education with Nice Computer Institute in Jahangirpuri!</p>
        @if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif
        <div class="row justify-content-center">
            <div class="col-md-6">
            <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Enquiry</label>
                        <textarea class="form-control" id="messages" name="messages" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>

        <div class="text-center mt-4">
            <p><strong>Find Us:</strong> 8 AM - 9 PM, Monday – Saturday</p>
            <p><strong>Phone:</strong> 9312945741</p>
            <p><strong>Email:</strong> admin@computerinstituteindelhijahangirpuri.com</p>
        </div>
    </div>
@endsection