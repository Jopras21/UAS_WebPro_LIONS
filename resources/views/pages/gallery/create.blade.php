@extends('layouts.dashboard_template')

@section('content')


<style>
.dz-preview.dz-image-preview {
    background-color: #e4e4e3 !important;
}
</style>

<div class="p-12 bg-[#293f71] min-h-screen rounded-md relative flex flex-col items-center">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="absolute top-4 left-1/2 transform -translate-x-1/2 w-32 h-auto">

    <h1 class="text-3xl font-bold text-white mb-6 mt-28">Upload Photos to Gallery</h1>

    <form id="my-dropzone" class="dropzone border-dashed border-4 border-[#3c5097] rounded-3xl bg-[#e4e4e3] p-12 w-10/12 mt-10 shadow-lg"
        action="{{ route('gallery.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @error('file')
        <div class="text-red-500 mb-4">{{ $message }}</div>
        @enderror

        <div class="mb-4">
            <label for="category" class="block text-[#293f71] text-sm font-semibold mb-2">Category</label>
            <select id="category" name="category_id"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-[#293f71] leading-tight focus:outline-none focus:shadow-outline">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="title" class="block text-[#293f71] text-sm font-semibold mb-2">Title</label>
            <input type="text" id="title" name="title" placeholder="Fill in the title before uploading files"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-[#293f71] leading-tight focus:outline-none focus:shadow-outline placeholder:text-xs">
            @error('title')
            <div class="text-red-500">{{ $message }}</div>
            @enderror

            <p class="text-[#293f71] font-medium text-xs mt-1">Max size 2 MB | jpg, jpeg, png, and webp only (preferred webp)</p>
        </div>

        <div class="dz-message flex flex-col items-center justify-center py-4">
            <i class="fas fa-cloud-upload-alt fa-3x text-[#3c5097]"></i>
            <h4 class="text-[#293f71] text-lg">Drag and drop files here or click to upload</h4>
        </div>
    </form>

    <div class="block mt-6">
        <input type="submit" form="my-dropzone" value="Submit" id="submit" class="text-sm text-white px-6 py-3 mr-4 bg-[#3c5097] hover:bg-[#4e6bbf] transition-all duration-200 rounded-lg shadow-md cursor-pointer"/>
        <a href="{{ route('gallery.index') }}" class="text-sm text-white px-6 py-3 bg-[#3c5097] hover:bg-[#4e6bbf] transition-all duration-200 rounded-lg shadow-md">Back</a>
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
