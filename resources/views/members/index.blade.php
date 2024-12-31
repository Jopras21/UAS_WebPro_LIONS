@extends('layouts.app')

@section('title', 'Member')

@section('content')
    <style>
        body {
            background-color: #030d16; 
            color: #e4e4e3; 
        }

        .add-member-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3c5097; 
            color: #e4e4e3; 
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }

        .add-member-button:hover {
            background-color: #293f71; 
        }

        .member-bph-card, .member-member-card {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .bph-card, .member-card {
            background-color: #1e1a1f; 
            border-radius: 10px;
            margin: 10px;
            padding: 15px;
            width: calc(25% - 20px); 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: relative; 
            overflow: hidden; 
            transition: transform 0.3s, height 0.4s ease;
            height: 260px; 
            display: flex;
            flex-direction: column; 
            align-items: center;
        }

        .bph-card:hover, .member-card:hover {
            transform: translateY(-5px); 
            height: 450px; 
        }

        img {
            width: 100%;
            height: 200px; 
            object-fit: cover; 
            border-radius: 10px;
        }

        .bph-card-text, .member-card-text {
            opacity: 0;
            position: absolute;
            bottom: 20px; 
            left: 15px;
            right: 15px;
            color: #e4e4e3; 
            transition: opacity 0.4s ease, transform 0.4s ease; 
            text-align: center;
            transform: translateY(20px); 
            pointer-events: none; 
        }

        .bph-card:hover .bph-card-text, .member-card:hover .member-card-text {
            opacity: 1; 
            transform: translateY(0); 
        }

        .bph-card-name, .member-card-name {
            font-size: 1.5em;
            color: #3c5097; 
            margin: 10px 0;
        }

        .bph-card-detail, .member-card-detail {
            font-size: 1em;
            color: #e4e4e3; 
            margin: 5px 0;
        }

        .edit-member-button, .delete-member-button {
            margin-top: 20px;
            padding: 10px 16px;
            background-color: #3c5097;
            color: #e4e4e3;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .edit-member-button:hover, .delete-member-button:hover {
            background-color: #293f71;
        }

        hr {
            border: 1px solid #3c5097; 
            margin: 20px 0;
        }
    </style>

    <div class="container">
        @if(auth()->check()) 
            <a href="{{ route('members.create', ['id' => auth()->user()->id]) }}" class="add-member-button">Add Member</a>
        @endif

        <div class="member-bph-card">
            @foreach ($members->whereIn('id', [1, 2, 3, 4]) as $key => $member)
            <div class="bph-card">
                <img src="{{ $member->photo ? asset('storage/' . $member->photo) : asset('images/placeholder.jpg') }}" alt="{{ $member->full_name }}">
                <h4 class="bph-card-name">{{ $member->full_name }}</h4>
                <div class="bph-card-text">
                    <p class="bph-card-detail">Role: {{ $member->role }}</p>
                    <p class="bph-card-detail">Jurusan: {{ $member->jurusan }}</p>
                    <p class="bph-card-detail">Year: {{ $member->angkatan }}</p>
                </div>
                @if(auth()->check()) 
                    <a href="{{ url('/members/edit/' . $member->id) }}" class="edit-member-button">Edit</a>
                    @if(auth()->user()->isAdmin()) <!-- Pengecekan untuk Admin -->
                        <form action="{{ url('/members/' . $member->id) }}" method="post" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-member-button" onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
                        </form>
                    @endif
                @endif
            </div>
            @endforeach
        </div>

        <hr>

        <div class="member-member-card">
            @foreach ($members->whereNotIn('id', [1, 2, 3, 4]) as $key => $member)
            <div class="member-card">
                <img src="{{ $member->photo ? asset('storage/' . $member->photo) : asset('images/placeholder.jpg') }}" alt="{{ $member->full_name }}">
                <h4 class="member-card-name">{{ $member->full_name }}</h4>
                <div class="member-card-text">
                    <p class="member-card-detail">Role: {{ $member->role }}</p>
                    <p class="member-card-detail">Jurusan: {{ $member->jurusan }}</p>
                    <p class="member-card-detail">Year: {{ $member->angkatan }}</p>
                </div>
                @if(auth()->check())
                    <a href="{{ url('/members/edit/' . $member->id) }}" class="edit-member-button">Edit</a>
                    @if(auth()->user()->isAdmin()) <!-- Pengecekan untuk Admin -->
                        <form action="{{ url('/members/' . $member->id) }}" method="post" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-member-button" onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
                        </form>
                    @endif
                @endif
            </div>
            @endforeach
        </div>
    </div>
@endsection
