<footer class="bg-gradient-to-r from-[#051022] to-[#3a4e93] py-8">
    <div class="container mx-auto flex justify-between items-center text-gray-50">
        <!-- Logo di sebelah kiri -->
        <div class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="UMN Logo" class="h-[100px] w-auto">
        </div>

        <!-- Alamat di sebelah kanan -->
        <div class="text-right">
            <p class="font-semibold">Universitas Multimedia Nusantara</p>
            <p>Jl. Scientia Boulevard, Curug Sangereng</p>
            <p>Kec. Klp. Dua, Kab. Tangerang, Banten 15810</p>
        </div>
    </div>

    <!-- Copyright -->
    <div class="mt-4 text-center text-gray-400">
        <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
    </div>
</footer>
