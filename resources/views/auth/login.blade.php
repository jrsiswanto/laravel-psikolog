<x-app-layout>
    <x-slot name="title">Masuk • Psikolog RSUD Jombang</x-slot>

    <div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
            <div class="text-center">
                <img src="{{ asset('favicon.ico') }}" alt="Logo" class="mx-auto h-12 w-12 rounded-full shadow">
                <h2 class="mt-6 text-3xl font-bold text-gray-900 dark:text-gray-100">Masuk ke Akun Anda</h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Psikolog RSUD Jombang
                </p>
            </div>

            <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                @csrf

                @if (session('status'))
                    <div class="text-green-600 text-sm text-center">{{ session('status') }}</div>
                @endif

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        placeholder="example@gmail.com"
                        class="appearance-none block w-full px-3 py-2 mt-1 border border-gray-300 dark:border-gray-600 
                        rounded-lg shadow-sm placeholder-gray-400 focus:outline-none 
                        focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-gray-100">
                    @error('email')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                    <input id="password" type="password" name="password" required
                        placeholder="**************"
                        class="appearance-none block w-full px-3 py-2 mt-1 border border-gray-300 dark:border-gray-600 
                        rounded-lg shadow-sm placeholder-gray-400 focus:outline-none 
                        focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-gray-100">
                    @error('password')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Ingat saya</span>
                    </label>
                </div>

                {{-- Tombol Masuk --}}
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg 
                        shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 
                        transition duration-150 ease-in-out">
                        Masuk
                    </button>
                </div>

                {{-- Link ke Daftar --}}
                <p class="text-center text-sm text-gray-600 dark:text-gray-400 mt-4">
                    Belum punya akun?
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-500 font-semibold">
                            Daftar
                        </a>
                    @else
                        <a href="{{ url('/') }}" class="text-indigo-600 hover:text-indigo-500 font-semibold">
                            Kembali
                        </a>
                    @endif
                </p>
            </form>
        </div>
    </div>
</x-app-layout>
