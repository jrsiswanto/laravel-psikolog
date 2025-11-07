<x-app-layout>
    {{-- 1. HEADER HALAMAN --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambahkan Video Baru') }}
        </h2>
    </x-slot>

    {{-- 2. KONTEN UTAMA HALAMAN --}}
    <div class="w-full mx-auto sm:px-6 lg:px-8 min-h-screen">
        <div class="grid grid-cols-2 lg:grid-cols-2 gap-8">
            <form method="POST" action="{{ route('video.store') }}">
                @csrf

                {{-- Kolom Utama --}}
                <div class="lg:col-span-2 bg-white dark:bg-gray-800 shadow sm:rounded-lg border border-gray-200 dark:border-gray-700 p-6">

                    {{-- JUDUL --}}
                    <input type="text"
                           name="judul"
                           id="judul"
                           placeholder="Tambahkan judul video"
                           class="w-full text-2xl font-bold border-none focus:ring-0 bg-transparent text-black dark:text-black mb-4">

                    {{-- URL VIDEO --}}
                    <label for="url" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                        URL Video (YouTube, Vimeo, atau lainnya)
                    </label>
                    <input type="url"
                           name="url"
                           id="url"
                           placeholder="https://youtube.com/watch?v=..."
                           class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 rounded-md focus:ring-indigo-500 focus:border-indigo-500 mb-6">

                    {{-- KATEGORI --}}
                    <label for="kategori" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                        Kategori
                    </label>
                    <input type="text"
                           name="kategori"
                           id="kategori"
                           placeholder="Contoh: Edukasi, Motivasi, Psikologi"
                           class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 rounded-md focus:ring-indigo-500 focus:border-indigo-500 mb-6">

                    {{-- PENULIS --}}
                    <label for="penulis_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                        Penulis
                    </label>
                    <select name="penulis_id"
                            id="penulis_id"
                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 rounded-md focus:ring-indigo-500 focus:border-indigo-500 mb-6">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>

                    {{-- PREVIEW VIDEO --}}
                    <div class="mt-8">
                        <h3 class="font-semibold text-gray-800 dark:text-gray-200 mb-3">Pratinjau Video</h3>
                        <div id="video_preview" class="aspect-video bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-500 dark:text-gray-300 rounded-lg">
                            Tempelkan URL untuk melihat pratinjau
                        </div>
                    </div>
                </div>

                {{-- SIDEBAR --}}
                <div class="space-y-6">
                    {{-- PANEL TERBITKAN --}}
                    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg border border-gray-200 dark:border-gray-700 p-4">
                        <button type="submit" class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold">
                            Terbitkan Video
                        </button>
                    </div>

                    {{-- PANEL INFORMASI TAMBAHAN --}}
                    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg border border-gray-200 dark:border-gray-700 p-4">
                        <h3 class="font-semibold text-gray-800 dark:text-gray-200 mb-3">Informasi</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Pastikan URL video berasal dari sumber terpercaya seperti YouTube atau Vimeo.
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- SCRIPT PREVIEW VIDEO --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const urlInput = document.getElementById('url');
            const preview = document.getElementById('video_preview');

            urlInput.addEventListener('input', () => {
                const url = urlInput.value.trim();
                if (url.includes('youtube.com/watch?v=')) {
                    const videoId = new URL(url).searchParams.get('v');
                    preview.innerHTML = `<iframe width="100%" height="100%" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allowfullscreen></iframe>`;
                } else if (url.includes('vimeo.com/')) {
                    const videoId = url.split('/').pop();
                    preview.innerHTML = `<iframe width="100%" height="100%" src="https://player.vimeo.com/video/${videoId}" frameborder="0" allowfullscreen></iframe>`;
                } else {
                    preview.innerHTML = '<p class="text-gray-500 dark:text-gray-300">URL tidak dikenali atau belum valid.</p>';
                }
            });
        });
    </script>
</x-app-layout>
