@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row text-center">
        @foreach ($members as $member)
        <div class="col-md-3">
            <div class="card">
                <img src="{{ Storage::url($member->image) }}" class="card-img-top" alt="{{ $member->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $member->name }}</h5>
                    <p class="card-text">{{ $member->position }}</p>
                    <p class="card-text"><small>{{ $member->department }}</small></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
