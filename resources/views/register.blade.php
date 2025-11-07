@extends('layout')

@section('body')
    <div class="container mx-auto py-12 flex justify-center">

        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">

            <h2 class="text-3xl font-bold text-center text-gray-900 mb-6">
                Buat Akun Baru
            </h2>

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Lengkap
                    </label>
                    <input type="text" id="name" name="name"
                           class="w-full px-3 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm
                                  focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="John Doe" value="{{ old('name') }}" required>

                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Alamat Email
                    </label>
                    <input type="email" id="email" name="email"
                           class="w-full px-3 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm
                                  focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="anda@email.com" value="{{ old('email') }}" required>

                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Kata Sandi
                    </label>
                    <input type="password" id="password" name="password"
                           class="w-full px-3 py-2 border @error('password') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm
                                  focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="Buat kata sandi" required>

                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                        Konfirmasi Kata Sandi
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                                  focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="Ulangi kata sandi" required>
                </div>

                <div>
                    <button type="submit"
                            class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded-md
                                   hover:bg-blue-700 focus:outline-none focus:ring-2
                                   focus:ring-blue-500 focus:ring-opacity-50 transition duration-200">
                        Daftar
                    </button>
                </div>
            </form>

            <p class="text-center text-sm text-gray-600 mt-6">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                    Masuk di sini
                </a>
            </p>

        </div>
    </div>
@endsection
