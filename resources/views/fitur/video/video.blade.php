<x-app-layout>
    {{-- HEADER HALAMAN --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Video Edukasi') }}
        </h2>
    </x-slot>

    {{-- KONTEN UTAMA --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                {{-- Tombol Tambah Video (khusus admin) --}}
                @if (Auth::user() && Auth::user()->role === 'admin')
                    <div class="mb-6 flex justify-end">
                        <a href="{{ route('video.create') }}"
                           class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                            + Tambah Video
                        </a>
                    </div>
                @endif

                {{-- Daftar Video --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($videos as $video)
                        <div class="border dark:border-gray-700 rounded-xl overflow-hidden shadow hover:shadow-lg transition">
                            <div class="aspect-w-16 aspect-h-9">
                                <iframe src="{{ $video->embed_url }}" class="w-full h-56" allowfullscreen></iframe>
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100 mb-2">
                                    {{ $video->judul }}
                                </h3>
                                <p class="text-sm text-gray-500 mb-3">
                                    Kategori: <span class="text-indigo-600 dark:text-indigo-400">{{ $video->kategori }}</span>
                                </p>
                                <div class="flex justify-between items-center text-sm text-gray-600 dark:text-gray-300">
                                    <span>{{ $video->views }} views</span>
                                    <a href="{{ route('video.show', $video->id) }}"
                                       class="text-indigo-600 hover:text-indigo-800 dark:hover:text-indigo-400">
                                        Lihat Video →
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-600 dark:text-gray-300">Belum ada video yang ditambahkan.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
