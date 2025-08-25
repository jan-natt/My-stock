@extends('layout.main')
@section('title', 'Register - StockPro')

@section('content')
<div class="container mt-5 pt-5">
    <h2 class="mb-4">User Registration</h2>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
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
            <input type="text" class="form-control" id="phone" name="phone">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div class="mb-3">
            <label for="nid-number" class="form-label">NID Number</label>
            <input type="text" class="form-control" id="nid-number" name="nid-number">
        </div>
        <div class="mb-3">
            <label for="nid_verification_photo" class="form-label">NID Verification Photo</label>
            <input type="file" class="form-control" id="nid_verification_photo" name="nid_verification_photo">
        </div>
        <div class="mb-3">
            <label for="user_photo" class="form-label">User Photo</label>
            <input type="file" class="form-control" id="user_photo" name="user_photo">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>