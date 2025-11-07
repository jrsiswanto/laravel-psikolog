<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajukan Pertanyaan Baru') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
            <form method="POST" action="{{ route('tanya-jawab.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Pertanyaan</label>
                    <textarea name="pertanyaan" rows="5" required
                        class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Tuliskan pertanyaan Anda di sini..."></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Kategori (Opsional)</label>
                    <input type="text" name="kategori" placeholder="Contoh: Stres, Hubungan, dll"
                        class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold">
                        Kirim Pertanyaan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
