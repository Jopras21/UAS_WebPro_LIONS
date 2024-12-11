@extends('layouts.app')

@section('content')


<div class="">
    <div class="py-10">
        <div class="min-w-screen h-3 bg-[#9BAA89] flex justify-center items-center">
            <h1 class="text-xl sm:text-3xl font-bold bg-white text-[#253A35] text-center inline-block px-3">
                {{ $currentCategory->name }}
            </h1>
        </div>
    </div>

    @if ($galleries->isEmpty())
    <div class="mx-auto min-h-[500px] px-6 pb-5 sm:px-12">
        <div class="flex justify-center items-center h-96">
            <h1 class="text-2xl font-semibold text-gray-400">No photos available</h1>
        </div>
    </div>
    @else
    <div class="px-6 pb-10 sm:px-12 mx-auto min-h-[500px]">
        <div class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-3 lg:gap-5">
            @foreach ($galleries as $gallery)
            <a href="{{ asset($gallery->path) }}" data-fancybox="gallery">
                <img class="rounded-lg object-cover {{ $loop->iteration != 1 ? 'mt-3 lg:mt-5' : '' }}" src="{{ asset($gallery->path) }}" alt="{{ $gallery->title }}">
            </a>
            @endforeach
        </div>
    </div>
    
    @endif

    @if ($categories->count() > 1)
    <div class="flex justify-between py-16 px-6 sm:px-12 bg-[#415c3f]">
        @if ($previousCategory)
        <div class="">
            <a href="{{ route('gallery.user_show', $previousCategory->slug) }}"
                class="text-sm text-white px-4 py-3 bg-[#849274] hover:underline transition-all duration-200 rounded-lg min-w-40"><i
                    class="ri-arrow-left-s-line"></i> <span class="hidden md:contents">{{
                $previousCategory->name }}</span></a>
        </div>
        @else
        <div></div>
        @endif

        @if ($nextCategory)
        <div class="">
            <a href="{{ route('gallery.user_show', $nextCategory->slug) }}"
                class="text-sm text-white px-4 py-3 bg-[#849274] hover:underline transition-all duration-200 rounded-lg min-w-40"><span class="hidden md:contents">{{
                $nextCategory->name }}</span> <i class="ri-arrow-right-s-line"></i></a>
        </div>
        @else
        <div></div>
        @endif
    </div>
    @endif

</div>

@endsection