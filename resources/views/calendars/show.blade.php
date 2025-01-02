@extends('layouts.app')

@section('content')

<div class="container mx-auto p-4 text-white">
    <h1 class="text-2xl font-bold mb-4">All Events</h1>

    @if($events->isEmpty())
    <p>No events found.</p>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($events as $event)
        <div class="border rounded-lg p-4 flex flex-row items-center">
            <div class="flex-grow">
                <h2 class="text-xl font-semibold">{{ $event->title }}</h2>
                <p class="text-gray-600">{{ $event->description }}</p>
                <p class="text-sm text-gray-500">{{ $event->date }}</p>
            </div>
            <div class="ml-4">
                @if(auth()->check())
                <a href="{{ route('calendars.edit', ['id' => $event->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 ml-2">
                    Edit
                </a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

@endsection