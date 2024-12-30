@extends('layouts.app')

@section('content')

<style>
    .scrollable {
        overflow-y: auto;
        max-height: 500px;
    }
    
    .custom-text {
        color: #e4e4e3; 
    }
</style>

<div class="mx-auto min-h-[500px] p-6 sm:p-12 custom-bg">
    @if (session()->has('status'))
    @include('components.status', ['status' => session('status')])
    @endif

    <div class="flex flex-col lg:flex-row mx-auto space-y-6 lg:space-y-0 lg:space-x-3">

        <div class="lg:w-1/4">
            <ul class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-md">
                <li class="w-full font-semibold px-6 py-4 text-base border-b bg-gray-100 text-center">Select Category
                </li>
                @foreach ($categories as $category)
                    <a href="{{ route('gallery.index', ['category' => $category->slug]) }}">
                        <li class="w-full px-6 py-4 border-b border-gray-200  
                        {{ $currentCategory && $category->slug == $currentCategory->slug ? 'bg-gray-300 hover:bg-gray-400' : 'hover:bg-gray-200' }}">
                            {{ $category->name }}
                        </li>
                    </a>
                @endforeach
            </ul>
            <a href="{{ route('gallery.create') }}"
                class="w-full px-6 py-4 text-center bg-blue-700 text-white font-semibold rounded-md mt-4 block">Upload
                Photos</a>
            <div class="block w-full mt-4 just">
                <a href="{{ route('category.index') }}" class="w-full px-6 py-4 text-center bg-blue-700 text-white font-semibold rounded-md mt-4 block">Category</a>
            </div>
        </div>
        

        <div class="lg:w-3/4 scrollable">
            @if ($galleries->isEmpty())
            <div class="text-center custom-text">
                <h1 class="text-2xl font-semibold">No Photos Found</h1>
                @if($currentCategory)
                <p>There are no photos in {{ $currentCategory->name }}</p>
                @else
                <p>There are no photos in this category</p>
                @endif
            </div>

            @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-4">
                @foreach ($galleries as $gallery)
                <div class="border rounded-lg overflow-hidden">
                    <a href="{{ asset($gallery->path) }}" data-fancybox="gallery" data-caption="{{ $gallery->title }}">
                        <img src="{{ asset($gallery->path) }}" alt="{{ $gallery->title }}" class="w-full h-48 object-cover">
                    </a>

                    <div class="p-4 flex justify-between flex-wrap custom-text">
                        <div>
                            <h3 class="font-semibold text-sm lg:text-base">{{ $gallery->title }}</h3>
                            <p class="text-xs lg:text-sm">{{ $gallery->created_at->format('d M Y') }} by
                                {{ $gallery->user->name }}</p>
                        </div>

                        <div>
                            <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 bg-red-500 text-white hover:bg-red-700 focus:outline-none rounded-sm flex items-center justify-center">
                                    <i class="ri-delete-bin-line text-sm"></i>
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        Fancybox.bind("[data-fancybox]", {
        });
    });
</script>

@endsection
