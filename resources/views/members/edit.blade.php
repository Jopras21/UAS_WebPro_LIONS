@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #030d16; 
        color: #e4e4e3; 
        font-family: Arial, sans-serif; 
    }

    h1 {
        color: #3c5097; 
        text-align: center;
        margin-bottom: 30px;
        font-size: 2em; 
    }

    .form-container {
        background-color: #1e1a1f; 
        border-radius: 10px;
        padding: 30px;
        max-width: 600px;
        margin: 0 auto; 
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .error-list {
        background-color: #ffdddd; 
        color: #d8000c; 
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
        list-style-type: none; 
    }

    .error-list li {
        margin: 5px 0; 
    }

    label {
        display: block;
        margin: 15px 0 5px;
        font-weight: bold;
        color: #3c5097; 
    }

    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 12px;
        border: 1px solid #3c5097; 
        border-radius: 5px;
        background-color: #e4e4e3; 
        color: #030d16; 
        margin-bottom: 20px;
        transition: border-color 0.3s; 
    }

    input[type="text"]:focus,
    input[type="file"]:focus {
        border-color: #3c5097; 
        outline: none; 
    }

    button {
        background-color: #3c5097; 
        color: #e4e4e3; 
        padding: 12px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s; 
        width: 100%; 
        font-size: 1em; 
    }

    button:hover {
        background-color: #293f71; 
        transform: translateY(-2px); 
    }

    button:active {
        transform: translateY(0); 
    }

    .delete-button {
        background-color: #d8000c; 
    }

    .delete-button:hover {
        background-color: #a6000a; 
    }
</style>

<h1>Edit Member</h1>

@if($errors->any())
<div class="error-list">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-container">
    <form action="/members/{{$member->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="full_name">Full Name</label>
        <input type="text" name="full_name" id="full_name" value="{{ old('full_name', $member->full_name) }}" required />

        <label for="role">Role</label>
        <input type="text" name="role" id="role" value="{{ old('role', $member->role) }}" required />

        <label for="jurusan">Major</label>
        <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan', $member->jurusan) }}" required />

        <label for="angkatan">Year</label>
        <input type="text" name="angkatan" id="angkatan" value="{{ old('angkatan', $member->angkatan) }}" required />

        <label for="photo">Photo</label>
        <input type="file" name="photo" id="photo" required />

        <button type="submit">Submit</button>
    </form>

    <form action="/members/{{$member->id}}" method="post" style="margin-top: 10px;">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
    </form>
</div>
@endsection
