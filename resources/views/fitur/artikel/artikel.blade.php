<x-app-layout>
    {{-- HEADER HALAMAN --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Artikel Terbaru') }}
        </h2>
    </x-slot>

    {{-- KONTEN UTAMA --}}
    <div class="py-12 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10 text-center">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Kumpulan Artikel Psikologi</h1>
                <p class="text-gray-500 dark:text-gray-400 mt-2">
                    Baca artikel pilihan tentang kesehatan mental, tips hidup seimbang, dan wawasan terbaru 🌿
                </p>
            </div>

            {{-- GRID ARTIKEL --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($artikel as $item)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-lg overflow-hidden transition-all duration-300">
                        {{-- GAMBAR --}}
                        <div class="relative w-full pt-[56.25%] bg-gray-200 dark:bg-gray-700">
                            @if ($item->gambar)
                                <img src="{{ asset('storage/img/' . $item->gambar) }}"
                                    alt="Gambar {{ $item->judul }}"
                                    class="absolute inset-0 w-full h-full object-cover">
                            @else
                                <div class="absolute inset-0 flex items-center justify-center text-gray-400">
                                    <span class="text-sm">Tidak ada gambar</span>
                                </div>
                            @endif
                        </div>

                        {{-- ISI ARTIKEL --}}
                        <div class="p-5 flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 hover:text-blue-600">
                                    <a href="{{ url('artikel/' . $item->id) }}">
                                        {{ $item->judul }}
                                    </a>
                                </h3>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
                                    {{ \Illuminate\Support\Str::words(strip_tags($item->slug), 10, '...') }}
                                </p>
                            </div>

                            {{-- INFO PENULIS DAN TANGGAL --}}
                            <div class="flex items-center justify-between mt-4 text-sm text-gray-500 dark:text-gray-400">
                                <div class="flex items-center space-x-2">
                                    @if (optional($item->penulis)->foto_profil)
                                        <img src="{{ asset('storage/' . $item->penulis->foto_profil) }}"
                                            class="w-6 h-6 rounded-full object-cover" alt="Foto Penulis">
                                    @else
                                        <img src="{{ asset('images/icon-man.svg') }}" class="w-6 h-6" alt="User">
                                    @endif
                                    <span>{{ optional($item->penulis)->name ?? 'Anonim' }}</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <img src="{{ asset('images/icon-calender.svg') }}" class="w-4 h-4" alt="Tanggal">
                                    <span>{{ $item->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- PAGINATION --}}
            <div class="mt-8">
    {{ $artikel->links() }}
</div>
        </div>
    </div>
</x-app-layout>
