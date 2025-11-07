<x-app-layout>
    {{-- HEADER HALAMAN --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $artikel->judul }}
        </h2>
    </x-slot>

    {{-- KONTEN UTAMA --}}
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">

                {{-- GAMBAR ARTIKEL (jika ada) --}}
                @if ($artikel->gambar)
                    <div class="mb-6">
                        <img src="{{ asset('storage/' . $artikel->gambar) }}" 
                             alt="{{ $artikel->judul }}"
                             class="w-full rounded-lg shadow-md">
                        @if ($artikel->keterangan_gambar)
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-2 text-center italic">
                                {{ $artikel->keterangan_gambar }}
                            </p>
                        @endif
                    </div>
                @endif

                {{-- DETAIL ARTIKEL --}}
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">
                        {{ $artikel->judul }}
                    </h1>

                    <div class="flex justify-between items-center text-sm text-gray-500 dark:text-gray-400 mb-6">
                        <div>
                            ✍️ Penulis: 
                            <span class="text-indigo-600 dark:text-indigo-400 font-medium">
                                {{ $artikel->penulis->name ?? 'Tidak diketahui' }}
                            </span>
                        </div>
                        <div>
                            👁️ {{ $artikel->views }} views
                        </div>
                    </div>

                    {{-- ISI ARTIKEL --}}
                    <article class="prose dark:prose-invert max-w-none text-gray-800 dark:text-gray-200 leading-relaxed">
                        {!! nl2br(e($artikel->isi)) !!}
                    </article>

                    {{-- TOMBOL KEMBALI --}}
                    <div class="mt-8">
                        <a href="{{ route('artikel.index') }}"
                           class="inline-block px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                            ← Kembali ke Daftar Artikel
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
