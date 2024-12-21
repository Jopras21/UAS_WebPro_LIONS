@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('members.create') }}" class="add-member-button">Add Member</a>

    <div class="member-bph-card">
        @foreach ($members->whereIn('id', [1, 2, 3, 4]) as $key => $member)
        <div class="bph-card bg-white m-10">
            <img src="{{ $member->photo ? asset('storage/' . $member->photo) : asset('images/placeholder.jpg') }}" alt="{{ $member->full_name }}">
            <div class="bph-card-text">
                <h4 class="bph-card-name">{{ $member->full_name }}</h4>
                <p class="bph-card-detail">{{ $member->role }}</p>
                <p class="bph-card-detail">{{ $member->jurusan }}</p>
                <p class="bph-card-detail">{{ $member->angkatan }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <hr>

    <div class="member-member-card">
        @foreach ($members->whereNotIn('id', [1, 2, 3, 4]) as $key => $member)
        <div class="member-card bg-white m-10">
            <img src="{{ $member->photo ? asset('storage/' . $member->photo) : asset('images/placeholder.jpg') }}" alt="{{ $member->full_name }}">
            <div class="member-card-text">
                <h4 class="member-card-name">{{ $member->full_name }}</h4>
                <p class="member-card-detail">{{ $member->role }}</p>
                <p class="member-card-detail">{{ $member->jurusan }}</p>
                <p class="member-card-detail">{{ $member->angkatan }}</p>
            </div>
        </div>
        @endforeach
    </div>

@endsection