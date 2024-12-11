@extends('layouts.dashboard_template')

@section('content')

<div class="rounded-md border bg-white border-gray-100 m-6 px-0 sm:p-6 shadow-md shadow-black/5">

    @if (session()->has('status'))
    <div class="mx-6">
        <div class="flex items-center p-4 mb-4 text-blue-800 border border-blue-300 rounded-lg bg-[#ebf5ff]"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 lg:w-5 lg:h-5 me-3" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <p class="text-sm font-medium">
                {{ session()->get('status') }}
            </p>
        </div>
    </div>
    @endif

    <div class="mx-auto min-h-[400px]">
        <div class="relative right-0 p-6">

            <div class="flex flex-col space-y-4 justify-center sm:space-y-0 sm:flex-row sm:justify-between mb-5">
                <h1 class="text-2xl text-center sm:text-left font-semibold text-gray-800">Photo Categories</h1>
                <button data-ripple-light="true" data-collapse-target="collapse"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                    Add
                </button>
            </div>

            <div data-collapse="collapse"
                class="block h-0 w-full basis-full overflow-hidden transition-all duration-300 ease-in-out mb-8">
                <div class="relative my-4 flex mx-auto w-8/12 justify-center flex-col rounded-xl text-gray-700">
                    <form class="leading-relaxed block max-w-md w-full mx-auto" action="{{ route('category.store') }}" method="POST">
                        @csrf

                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="name" id="name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="name"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                        </div>

                        <div class="flex justify-center">
                            <button type="submit"
                            class="text-white bg-[#415C3F] hover:bg-[#31492F] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="block opacity-100 overflow-x-auto">
                @if ($categories->isNotEmpty())
                <table class="w-full min-w-[540px]" data-tab-for="order" data-page="active">
                    <thead>
                        <tr>
                            <th
                                class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                                ID</th>
                            <th
                                class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                                Name</th>
                            <th
                                class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                Slug</th>
                            <th
                                class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                Created At</th>
                            <th
                                class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                Updated At</th>
                            <th
                                class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr class="hover:bg-slate-300">
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">{{ $category->id }}</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50 hover:underline">
                                <a href="{{ route('category.edit', $category->slug) }}"
                                    class="text-gray-600 text-sm font-medium">{{
                                    $category->name }}</a>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">{{ $category->slug
                                    }}</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">{{ $category->formatted_created_at
                                    }}</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">{{
                                    $category->formatted_updated_at
                                    }}</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <form action="{{ route('category.destroy', $category->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 text-sm font-medium">Delete</button>
                                </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-5">{{ $categories->links('vendor.pagination.tailwind') }}</div>
                @else
                <div class="flex items-center justify-center h-96">
                    <p class="text-gray-400 text-lg">Tidak ada kategori</p>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection