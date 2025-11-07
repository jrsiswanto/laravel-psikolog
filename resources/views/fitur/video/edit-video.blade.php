<x-app-layout>
    {{-- 1. HEADER HALAMAN --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Video') }}
        </h2>
    </x-slot>

    {{-- 2. KONTEN UTAMA --}}
    <div class="py-12" x-data="{ openDeleteModal: false }">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                {{-- Pesan sukses --}}
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- FORM EDIT VIDEO --}}
                <form action="{{ route('video.update', $video->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Judul Video --}}
                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Judul Video
                        </label>
                        <input type="text" id="judul" name="judul"
                            value="{{ old('judul', $video->judul) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 
                                   bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring
                                   focus:ring-indigo-500 focus:border-indigo-500">
                        @error('judul')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- URL YouTube --}}
                    <div class="mb-4">
                        <label for="url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            URL YouTube
                        </label>
                        <input type="text" id="url" name="url"
                            value="{{ old('url', $video->url) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 
                                   bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring
                                   focus:ring-indigo-500 focus:border-indigo-500">
                        <p class="text-sm text-gray-500 mt-1">
                            Contoh: https://www.youtube.com/watch?v=vXY6tBTqNBw
                        </p>
                        @error('url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div class="mb-4">
                        <label for="kategori" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Kategori
                        </label>
                        <input type="text" id="kategori" name="kategori"
                            value="{{ old('kategori', $video->kategori) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 
                                   bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring
                                   focus:ring-indigo-500 focus:border-indigo-500">
                        @error('kategori')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Pratinjau Video --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Pratinjau Video
                        </label>
                        @php
                            $embedUrl = str_replace('watch?v=', 'embed/', $video->url);
                        @endphp
                        <iframe src="{{ $embedUrl }}" class="w-full h-64 rounded-lg" allowfullscreen></iframe>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex justify-between items-center">
                        {{-- Tombol kiri: Hapus --}}
                        <button type="button"
                            @click="openDeleteModal = true"
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                            Hapus Video
                        </button>

                        {{-- Tombol kanan: Simpan / Batal --}}
                        <div class="flex space-x-3">
                            <a href="{{ route('video.index') }}"
                                class="px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-gray-100 
                                       rounded-lg hover:bg-gray-400 dark:hover:bg-gray-500 transition">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- MODAL KONFIRMASI HAPUS --}}
        <div x-show="openDeleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
            x-cloak>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-md">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">
                    Konfirmasi Hapus
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    Apakah Anda yakin ingin menghapus video <strong>{{ $video->judul }}</strong>?  
                    Tindakan ini tidak dapat dibatalkan.
                </p>
                <div class="flex justify-end space-x-3">
                    <button @click="openDeleteModal = false"
                        class="px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-gray-100 
                               rounded-lg hover:bg-gray-400 dark:hover:bg-gray-500 transition">
                        Batal
                    </button>
                    <form action="{{ route('video.destroy', $video->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
