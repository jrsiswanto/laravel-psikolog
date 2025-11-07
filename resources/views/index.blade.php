<x-app-layout>

    {{-- KONTEN UTAMA --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">

            {{-- HERO SECTION --}}
            <section class="text-center py-16">
                <h1 class="text-4xl font-extrabold text-gray-800 dark:text-gray-100 mb-4 animate__animated animate__fadeInUp">
                    Kesehatan Mental Anda Prioritas Kami
                </h1>
                <p class="text-gray-600 dark:text-gray-300 text-lg mb-8">
                    Temukan solusi terbaik untuk kesehatan mental Anda bersama psikolog profesional.
                </p>
            </section>

            {{-- LAYANAN KAMI --}}
            <section id="layanan" class="text-center">
                <h2 class="text-3xl font-bold mb-6 text-gray-800 dark:text-gray-100">Layanan Kami</h2>
                <p class="text-gray-500 dark:text-gray-300 mb-10">
                    Layanan psikolog profesional untuk mendukung kesehatan mental dan kesejahteraan Anda secara personal dan terpercaya.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Konsultasi --}}
                    <a href="/konsultasi" class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow hover:shadow-lg transition">
                        <img class="mx-auto w-16 h-16 mb-4" src="{{ asset('images/comment.svg') }}" alt="Konsultasi" />
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Konsultasi Psikolog</h4>
                        <p class="text-gray-500 dark:text-gray-300 text-sm">Bimbingan profesional untuk kesehatan mental Anda.</p>
                    </a>

                    {{-- Artikel --}}
                    <a href="{{ route('artikel.index') }}" class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow hover:shadow-lg transition">
                        <img class="mx-auto w-16 h-16 mb-4" src="{{ asset('images/newspaper-svgrepo-com.svg') }}" alt="Artikel" />
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Artikel</h4>
                        <p class="text-gray-500 dark:text-gray-300 text-sm">Informasi dan tips seputar psikologi dan kesejahteraan.</p>
                    </a>

                    {{-- Deteksi Dini --}}
                    <a href="#" class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow hover:shadow-lg transition">
                        <img class="mx-auto w-16 h-16 mb-4" src="{{ asset('images/detect.svg') }}" alt="Deteksi Dini" />
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Deteksi Dini</h4>
                        <p class="text-gray-500 dark:text-gray-300 text-sm">Screening sederhana untuk mengenali gejala awal.</p>
                    </a>

                    {{-- Tanya Jawab --}}
                    <a href="{{ route('tanya-jawab.index') }}" class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow hover:shadow-lg transition">
                        <img class="mx-auto w-16 h-16 mb-4" src="{{ asset('images/ask.svg') }}" alt="Tanya Jawab" />
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Tanya Jawab</h4>
                        <p class="text-gray-500 dark:text-gray-300 text-sm">Ruang aman untuk bertanya terkait isu psikologis.</p>
                    </a>

                    {{-- Video --}}
                    <a href="{{ route('video.index') }}" class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow hover:shadow-lg transition">
                        <img class="mx-auto w-16 h-16 mb-4" src="{{ asset('images/video.svg') }}" alt="Video" />
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Video</h4>
                        <p class="text-gray-500 dark:text-gray-300 text-sm">Materi audio-visual edukatif dari tim kami.</p>
                    </a>

                    {{-- Infografis --}}
                    <a href="{{ route('infografis.index') }}" class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow hover:shadow-lg transition">
                        <img class="mx-auto w-16 h-16 mb-4" src="{{ asset('images/infografis.svg') }}" alt="Infografis" />
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Infografis</h4>
                        <p class="text-gray-500 dark:text-gray-300 text-sm">Ringkasan visual topik-topik penting psikologi.</p>
                    </a>
                </div>
            </section>

            {{-- KENAPA KAMI --}}
            <section id="kenapa" class="text-center py-16">
                <h2 class="text-3xl font-bold mb-10 text-gray-800 dark:text-gray-100">Kenapa Kami?</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-blue-900 text-white p-6 rounded-2xl">
                        <img src="{{ asset('images/medal.svg') }}" class="mx-auto w-14 h-14 mb-4" alt="Berkualitas">
                        <h4 class="text-lg font-semibold mb-2">Layanan Berkualitas</h4>
                        <p>Didukung tim berpengalaman dan tepercaya.</p>
                    </div>
                    <div class="bg-blue-900 text-white p-6 rounded-2xl">
                        <img src="{{ asset('images/lock.svg') }}" class="mx-auto w-14 h-14 mb-4" alt="Privasi">
                        <h4 class="text-lg font-semibold mb-2">Privasi Terjaga</h4>
                        <p>Data dan konsultasi dijamin kerahasiaannya.</p>
                    </div>
                    <div class="bg-blue-900 text-white p-6 rounded-2xl">
                        <img src="{{ asset('images/globe.svg') }}" class="mx-auto w-14 h-14 mb-4" alt="Akses">
                        <h4 class="text-lg font-semibold mb-2">Akses Fleksibel</h4>
                        <p>Bisa digunakan kapan saja dan di mana saja.</p>
                    </div>
                </div>
            </section>

            {{-- ARTIKEL TERBARU --}}
            <section class="text-center">
                <h2 class="text-3xl font-bold mb-6 text-gray-800 dark:text-gray-100">Artikel Kesehatan</h2>
                <p class="text-gray-500 dark:text-gray-300 mb-10">
                    Baca informasi terbaru seputar kesehatan mental, edukasi, dan perkembangan layanan kami.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow hover:shadow-lg transition">
                        <img src="{{ asset('images/blog-01.png') }}" class="w-full" alt="Blog 1">
                        <div class="p-6 text-left">
                            <p class="text-sm text-gray-500">25 Desember 2025</p>
                            <h4 class="font-bold text-lg mt-2 mb-2">Free advertising for your online business</h4>
                            <a href="#" class="text-blue-600 dark:text-blue-400 font-semibold">Baca Selengkapnya →</a>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow hover:shadow-lg transition">
                        <img src="{{ asset('images/blog-02.png') }}" class="w-full" alt="Blog 2">
                        <div class="p-6 text-left">
                            <p class="text-sm text-gray-500">25 Desember 2025</p>
                            <h4 class="font-bold text-lg mt-2 mb-2">9 simple ways to improve your design skills</h4>
                            <a href="#" class="text-blue-600 dark:text-blue-400 font-semibold">Baca Selengkapnya →</a>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow hover:shadow-lg transition">
                        <img src="{{ asset('images/blog-03.png') }}" class="w-full" alt="Blog 3">
                        <div class="p-6 text-left">
                            <p class="text-sm text-gray-500">25 Desember 2025</p>
                            <h4 class="font-bold text-lg mt-2 mb-2">Tips to quickly improve your coding speed.</h4>
                            <a href="#" class="text-blue-600 dark:text-blue-400 font-semibold">Baca Selengkapnya →</a>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</x-app-layout>
