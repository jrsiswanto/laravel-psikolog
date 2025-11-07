<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Galeri Infografis') }}
        </h2>
    </x-slot>

    <div class="w-full mx-auto sm:px-6 lg:px-8 py-6 min-h-screen">
        {{-- Tombol Tambah Infografis --}}
        <div class="mb-6">
            <a href="{{ route('infografis.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Tambah Infografis
            </a>
        </div>

        {{-- Grid Infografis --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($infografis as $item)
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                    <div class="relative">
                        <img src="{{ $item->gambar_url ? asset('storage/' . $item->gambar_url) : 'https://via.placeholder.com/400x300?text=No+Image' }}" 
                             alt="{{ $item->judul }}" 
                             class="w-full h-48 object-cover">
                        {{-- Bisa ditambahkan badge kategori --}}
                        <span class="absolute top-2 left-2 bg-blue-600 text-white text-xs px-2 py-1 rounded">{{ $item->kategori }}</span>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">{{ $item->judul }}</h3>
                        <div class="flex justify-between items-center text-sm text-gray-500 dark:text-gray-400">
                            <span>Views: {{ $item->views }}</span>
                            <span>Penulis: {{ $item->penulis->name ?? '-' }}</span>
                        </div>
                    </div>
                    {{-- Tombol Edit & Hapus --}}
                    <div class="p-4 border-t border-gray-200 dark:border-gray-700 flex justify-between space-x-2">
                        <a href="{{ route('infografis.edit', $item->id) }}" class="flex-1 px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded text-center text-sm">
                            Edit
                        </a>
                        <form action="{{ route('infografis.destroy', $item->id) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded text-sm">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 dark:text-gray-400">
                    Belum ada infografis.
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
