@extends('layouts.app')

@section('content')
<h1>Edit Member</h1>

@if($errors)
<div class="error-list">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-container">
    <form action="/members" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="full_name">Full Name</label>
        <input type="text" name="full_name" id="full_name" value="{{ old('full_name', $member->full_name) }}" required />

        <label for="description">Role</label>
        <input type="text" name="role" id="role" value="{{ old('role', $member->role) }}" required />

        <label for="end">Major</label>
        <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan', $member->jurusan) }}" required />

        <label for="start">Year</label>
        <input type="text" name="angkatan" id="angkatan" value="{{ old('angkatan', $member->angkatan) }}" required />

        <label for="photo">Photo</label>
        <input type="file" name="photo" id="angkatan" value="{{ old('title', $member->title) }}" required />

        <button type="submit">Submit</button>
    </form>

    <form action="/members/{{$member->id}}" method="post" style="margin-top: 10px;">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
    </form>
</div>
</body>
@endsection