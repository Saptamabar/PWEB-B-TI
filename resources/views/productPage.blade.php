<div>
    <table>
        <thead>
            <th>
            <td>Product Name</td>
            </th>
            <th>
            <td>Product Deskripsion</td>
            </th>
            <th>
            <td>Stock</td>
            </th>
            <th>
            <td>Harga</td>
            </th>
            <th>
            <td>Product Category</td>
            </th>
            <th>
            <td>Seller</td>
            </th>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product['Nama'] }}</td>
                    <td>{{ $product['Deskripsi'] }}</td>
                    <td>{{ $product['Stok'] }}</td>
                    <td>{{ $product['Harga'] }}</td>
                    <td>{{ $product['kategoris']['Nama'] }}</td>
                    <td>{{ $product["users"]['name'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
