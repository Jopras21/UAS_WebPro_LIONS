@extends('layouts.app')

@section('content')
<h1>Add New Members</h1>

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
        <label for="full_name">Full Name</label>
        <input type="text" name="full_name" id="full_name" required />

        <label for="description">Role</label>
        <input type="text" name="role" id="role" required />

        <label for="end">Major</label>
        <input type="text" name="jurusan" id="jurusan" required />

        <label for="start">Year</label>
        <input type="text" name="angkatan" id="angkatan" required />

        <label for="photo">Photo</label>
        <input type="file" name="photo" id="angkatan" required />

        <button type="submit">Submit</button>
    </form>
</div>

@endsection