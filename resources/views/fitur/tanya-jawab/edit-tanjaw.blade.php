<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Jawab Pertanyaan') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">
                {{ $tanya->pertanyaan }}
            </h3>

            <form method="POST" action="{{ route('tanya-jawab.update', $tanya->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Jawaban</label>
                    <textarea name="jawaban" rows="5" required
                        class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Tuliskan jawaban di sini...">{{ $tanya->jawaban }}</textarea>
                </div>

                <button type="submit"
                    class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold">
                    Kirim Jawaban
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
