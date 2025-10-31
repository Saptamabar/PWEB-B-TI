@extends('layout')

@section('body')
<form method="POST" href={{ route('product.tambah') }}>
    @csrf
    <button type='submit'> Tambah</button>
</form>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Product Deskripsion
                </th>
                <th scope="col" class="px-6 py-3">
                    Stock
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga
                </th>
                <th scope="col" class="px-6 py-3">
                    Product Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Seller
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $product->Nama }}
                </th>
                <td class="px-6 py-4">
                    {{ $product->Deskripsi }}
                </td>
                <td class="px-6 py-4">
                    {{ $product->Stok }}
                </td>
                <td class="px-6 py-4">
                    {{ $product->Harga }}
                </td>
                <td class="px-6 py-4">
                    {{ $product->kategori_id }}
                </td><td class="px-6 py-4">
                    {{ $product->user_id }}
                </td>

                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
