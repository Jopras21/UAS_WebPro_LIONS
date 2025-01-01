@extends('layouts.app')

@section('title', 'Calendar')

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">All Events</h1>
    
    @if($events->isEmpty())
        <p>No events found.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($events as $event)
                <div class="border rounded-lg p-4">
                    <h2 class="text-xl font-semibold">{{ $event->title }}</h2>
                    <p class="text-gray-600">{{ $event->description }}</p>
                    <p class="text-sm text-gray-500">{{ $event->date }}</p>
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection