@extends('layout')

@section('body')
<div class="container mx-auto p-8">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-2xl mx-auto">

        <h2 class="text-3xl font-bold text-gray-900 mb-6">
            Edit Produk: <span class="text-blue-600">{{ $produk->Nama }}</span>
        </h2>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('product.update', $produk->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="md:col-span-2">
                    <label for="Nama" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Produk
                    </label>
                    <input type="text" id="Nama" name="Nama"
                           class="w-full px-3 py-2 border @error('Nama') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="Contoh: Laptop Pro"
                           value="{{ old('Nama', $produk->Nama) }}" required>

                    @error('Nama')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="Deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi
                    </label>
                    <textarea id="Deskripsi" name="Deskripsi" rows="4"
                              class="w-full px-3 py-2 border @error('Deskripsi') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                              placeholder="Tulis deskripsi singkat produk di sini...">{{ old('Deskripsi', $produk->Deskripsi) }}</textarea>

                    @error('Deskripsi')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="Stok" class="block text-sm font-medium text-gray-700 mb-2">
                        Stok
                    </label>
                    <input type="number" id="Stok" name="Stok"
                           class="w-full px-3 py-2 border @error('Stok') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="0" value="{{ old('Stok', $produk->Stok) }}" required>

                    @error('Stok')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="Harga" class="block text-sm font-medium text-gray-700 mb-2">
                        Harga
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                            Rp
                        </span>
                        <input type="number" id="Harga" name="Harga"
                               class="w-full pl-10 pr-3 py-2 border @error('Harga') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                               placeholder="15000000" value="{{ old('Harga', $produk->Harga) }}" required>
                    </div>
                    @error('Harga')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Kategori
                    </label>
                    <select id="kategori_id" name="kategori_id"
                            class="w-full px-3 py-2 border @error('kategori_id') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>

                        <option value="" disabled>-- Pilih Kategori --</option>

                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}"
                                {{ (old('kategori_id', $produk->kategori_id) == $kategori->id) ? 'selected' : '' }}>
                                {{ $kategori->Nama }}
                            </option>
                        @endforeach

                    </select>

                    @error('kategori_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="flex justify-end mt-8">
                <a href="{{ route('product.index') }}"
                   class="bg-gray-200 text-gray-700 font-bold py-2 px-4 rounded-md mr-3
                          hover:bg-gray-300 transition duration-200">
                    Batal
                </a>
                <button type="submit"
                        class="bg-blue-600 text-white font-bold py-2 px-4 rounded-md
                               hover:bg-blue-700 focus:outline-none focus:ring-2
                               focus:ring-blue-500 focus:ring-opacity-50 transition duration-200">
                    Simpan Perubahan
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
