<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Forum Tanya Jawab') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="mb-6 flex justify-between">
            <a href="{{ route('tanya-jawab.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Ajukan Pertanyaan
            </a>
        </div>

        {{-- DAFTAR PERTANYAAN --}}
        <div class="space-y-4">
            @forelse ($pertanyaan as $item)
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg border border-gray-200 dark:border-gray-700 p-5">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                            {{ $item->pertanyaan }}
                        </h3>
                        <span class="text-sm {{ $item->status == 'sudah dijawab' ? 'text-green-600' : 'text-yellow-600' }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </div>
                    <div class="text-sm text-gray-500 mt-1">
                        Kategori: {{ $item->kategori ?? 'Umum' }} | Penanya: {{ $item->penanya->name ?? '-' }}
                    </div>

                    {{-- Jawaban --}}
                    @if ($item->jawaban)
                        <div class="mt-3 p-3 bg-gray-50 dark:bg-gray-900 rounded border border-gray-200 dark:border-gray-700">
                            <strong class="text-gray-700 dark:text-gray-300">Jawaban:</strong>
                            <p class="text-gray-800 dark:text-gray-200 mt-1">{{ $item->jawaban }}</p>
                            <p class="text-xs text-gray-500 mt-1">Dijawab oleh: {{ $item->psikiater->name ?? '-' }}</p>
                        </div>
                    @else
                        <div class="mt-3 text-gray-500 dark:text-gray-400 italic">
                            Belum ada jawaban.
                        </div>
                    @endif

                    {{-- Tombol edit/hapus (opsional untuk admin atau psikiater) --}}
                    @if (Auth::user() && Auth::user()->id == $item->psikiater_id)
                        <div class="mt-3 flex gap-2">
                            <a href="{{ route('tanya-jawab.edit', $item->id) }}" class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-sm rounded">Edit</a>
                            <form action="{{ route('tanya-jawab.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm rounded">Hapus</button>
                            </form>
                        </div>
                    @endif
                </div>
            @empty
                <p class="text-gray-500 text-center">Belum ada pertanyaan.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
