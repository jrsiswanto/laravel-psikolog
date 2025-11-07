<x-app-layout>
    {{-- 1. HEADER HALAMAN --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambahkan Infografis Baru') }}
        </h2>
    </x-slot>

    {{-- 2. KONTEN UTAMA HALAMAN --}}
    <div class="w-full mx-auto sm:px-6 lg:px-8 min-h-screen">
        <div class="grid grid-cols-2 lg:grid-cols-2 gap-8">
            <form method="POST" action="{{ route('infografis.store') }}" enctype="multipart/form-data">
                @csrf
                
                {{-- Kolom Utama --}}
                <div class="lg:col-span-2 bg-white dark:bg-gray-800 shadow sm:rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                    {{-- Judul --}}
                    <input type="text"  
                           placeholder="Tambahkan judul infografis"  
                           class="w-full text-2xl font-bold border-none focus:ring-0 bg-transparent text-black dark:text-black mb-4"
                           name="judul"
                           id="judul">

                    {{-- Kategori --}}
                    <input type="text"
                           placeholder="Kategori infografis"
                           class="w-full border-b border-gray-300 dark:border-gray-600 bg-transparent focus:ring-0 text-black dark:text-black mb-4"
                           name="kategori"
                           id="kategori">
                </div>

                {{-- Sidebar Kanan --}}
                <div class="space-y-6">
                    {{-- Tombol Terbitkan --}}
                    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg border border-gray-200 dark:border-gray-700 p-4">
                        <button class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold">
                            Terbitkan
                        </button>
                    </div>

                    {{-- Panel Gambar --}}
                    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg border border-gray-200 dark:border-gray-700 p-4">
                        <h3 class="font-semibold text-gray-800 dark:text-gray-200 mb-3">Unggah Gambar</h3>
                        <input type="file" id="gambar_url" name="gambar_url" class="hidden" accept="image/*">

                        <button type="button" id="upload_button" class="w-full px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-100 rounded-lg">
                            Pilih Gambar
                        </button>

                        <div id="image_preview_container" class="hidden mt-4">
                            <img id="image_preview" src="" alt="Preview Gambar" class="w-full rounded-lg border border-gray-300 dark:border-gray-600">
                            <button type="button" id="remove_image_button" class="w-full text-sm text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 mt-2 text-center">
                                Hapus Gambar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Script Preview Gambar --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('gambar_url');
            const uploadButton = document.getElementById('upload_button');
            const previewContainer = document.getElementById('image_preview_container');
            const imagePreview = document.getElementById('image_preview');
            const removeButton = document.getElementById('remove_image_button');

            uploadButton.addEventListener('click', () => fileInput.click());

            fileInput.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        imagePreview.setAttribute('src', event.target.result);
                        previewContainer.classList.remove('hidden');
                        uploadButton.classList.add('hidden');
                    }
                    reader.readAsDataURL(file);
                }
            });

            removeButton.addEventListener('click', () => {
                fileInput.value = null;
                imagePreview.setAttribute('src', '');
                previewContainer.classList.add('hidden');
                uploadButton.classList.remove('hidden');
            });
        });
    </script>
</x-app-layout>
