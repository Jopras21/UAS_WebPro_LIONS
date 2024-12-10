@extends('layouts.app')

@section('content')

<div class="bg-gallery">
    <div class="py-10">
        <div class="min-w-screen h-3 bg-[#9BAA89] flex justify-center items-center">
            <h1 class="text-3xl font-bold bg-white text-[#253A35] text-center inline-block px-3">Gallery</h1>
        </div>
    </div>

    <div class="mx-auto min-h-[500px] px-6 pb-5 sm:px-12">

        <div
            class="flex flex-col justify-center lg:justify-between lg:flex-row mx-auto space-y-6 lg:space-y-0 lg:space-x-3">

            <div class="w-full lg:w-1/5 ">
                <h1 class="text-xl mb-5 font-semibold">Events</h1>
                <div class="flex justify-between flex-wrap flex-row lg:justify-normal lg:flex-col">
                    @foreach ($categories as $category)
                    <a href="{{ route('gallery.user_show', $category->slug) }}"
                        class="w-full sm:w-[170px] text-sm mx-1 lg:w-5/6 text-center text-white px-6 py-4 bg-[#849274] hover:bg-[#415c3f] transition-all duration-200 mb-8 shadow-md flex justify-center items-center">{{
                        $category->name }}
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="w-full lg:w-4/5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <img src="{{ asset('assets/foto/pelantikan_1.jpg') }}" alt="pelantikan_1"
                        class="shadow-2xl rounded-lg">
                    <img src="{{ asset('assets/foto/je_and.jpg') }}" alt="je_and" class="shadow-2xl rounded-lg">
                </div>
            </div>

        </div>
    </div>
</div>
@endsection