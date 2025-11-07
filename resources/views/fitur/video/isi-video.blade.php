<x-app-layout>
    {{-- HEADER HALAMAN --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $video->judul }}
        </h2>
    </x-slot>

    {{-- KONTEN UTAMA --}}
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">

                {{-- Video Player --}}
                <div class="aspect-w-16 aspect-h-9 mb-6">
                    <iframe src="{{ $video->embed_url }}" class="w-full h-56" allowfullscreen></iframe>
                </div>

                {{-- Detail Video --}}
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-2">
                        {{ $video->judul }}
                    </h3>
                    <p class="text-sm text-gray-500 mb-4">
                        Kategori: <span class="text-indigo-600 dark:text-indigo-400">{{ $video->kategori }}</span>
                    </p>

                    <div class="flex justify-between items-center text-gray-600 dark:text-gray-300 mb-4">
                        <span>👁️ {{ $video->views }} views</span>
                        <span>✍️ {{ $video->penulis->name ?? 'Tidak diketahui' }}</span>
                    </div>

                    <a href="{{ route('video.index') }}"
                       class="inline-block mt-4 px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                        ← Kembali ke Daftar Video
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
