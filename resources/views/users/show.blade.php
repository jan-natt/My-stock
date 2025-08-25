@extends('layout.main')

@section('title', 'User Details - StockPro')
@section('content')

<div class="container">
    <h1>User Details</h1>
    
    <div class="user-details">
        <div class="user-info">
            <h2>{{ $users->name }}</h2>
            <p><strong>Email:</strong> {{ $users->email }}</p>
            <p><strong>Phone:</strong> {{ $users->phone }}</p>
            <p><strong>NID Number:</strong> {{ $users->nid_number }}</p>
        </div>

        @if($users->user_photo)
        <div class="user-photo">
            <h3>Profile Photo</h3>
            <img src="{{ asset($user->user_photo) }}" alt="Profile Photo" style="max-width: 300px; height: auto;">
        </div>
        @endif

        @if($users->nid_verification_photo)
        <div class="nid-photo">
            <h3>NID Verification Photo</h3>
            <img src="{{ asset($user->nid_verification_photo) }}" alt="NID Verification Photo" style="max-width: 300px; height: auto;">
        </div>
        @endif

        <div class="actions">
            <a href="#" class="btn btn-primary">Edit User</a>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>

<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }
    
    .user-details {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin-top: 20px;
    }
    
    .user-info {
        margin-bottom: 20px;
    }
    
    .user-photo, .nid-photo {
        margin-bottom: 20px;
    }
    
    .actions {
        margin-top: 20px;
    }
    
    .btn {
        padding: 10px 20px;
        margin-right: 10px;
        text-decoration: none;
        border-radius: 4px;
        display: inline-block;
    }
    
    .btn-primary {
        background: #007bff;
        color: white;
    }
    
    .btn-secondary {
        background: #6c757d;
        color: white;
    }
</style>
@endsection
