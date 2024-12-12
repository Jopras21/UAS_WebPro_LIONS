@extends('layouts.dashboard_template')

@section('content')

<div class="p-12 bg-white min-h-[500px] rounded-md shadow-md">
    <h1 class="text-2xl font-semibold text-[#293f71] mb-6">Upload Photos to Gallery</h1>

    <form id="my-dropzone" class="dropzone border-dashed border-4 border-[#293f71] rounded-md"
        action="{{ route('gallery.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @error('file')
        <div class="text-red-500">{{ $message }}</div>
        @enderror

        <div class="mb-4">
            <label for="category" class="block text-gray-700 text-sm font-semibold mb-2">Category</label>
            <select id="category" name="category_id"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-[#e4e4e3]">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-semibold mb-2">Title</label>
            <input type="text" id="title" name="title" placeholder="Fill in the title before uploading files"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder:text-xs bg-[#e4e4e3]">
            @error('title')
            <div class="text-red-500">{{ $message }}</div>
            @enderror

            <p class="text-gray-400 font-medium text-xs mt-1">Max size 2 MB | jpg, jpeg, png, and webp only (preferred webp)</p>
        </div>

        <div class="dz-message flex flex-col items-center justify-center py-4">
            <i class="fas fa-cloud-upload-alt fa-3x text-[#293f71]"></i>
            <h4 class="text-gray-500 text-lg">Drag and drop files here or click to upload</h4>
        </div>
    </form>

    <div class="flex justify-center my-5">
        <button type="submit" form="my-dropzone" class="text-sm text-white px-4 py-3 bg-[#3c5097] hover:bg-[#849274] transition-all duration-200 rounded-lg">Upload</button>
    </div>

    <div class="flex justify-center my-5">
        <a href="{{ route('gallery.index') }}" class="text-sm text-white px-4 py-3 bg-[#3c5097] hover:bg-[#849274] transition-all duration-200 rounded-lg">Back</a>
    </div>
</div>

<script>
    Dropzone.options.myDropzone = {
        autoProcessQueue: true, 
        paramName: "file",
        maxFilesize: 2, 
        acceptedFiles: "image/*",
        init: function() {
            this.on("sending", function(file, xhr, formData) {
                formData.append("category_id", document.getElementById("category").value);
                formData.append("title", document.getElementById("title").value);
                formData.append("user_id", {{ auth()->user()->id }});
            });

            this.on("success", function(file, response) {
                console.log('File uploaded successfully.');
            });

            this.on("error", function(file, response) {
                console.error('Error uploading file:', response);
            });
        }
    };
</script>

@endsection
