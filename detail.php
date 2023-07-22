<h1>Detail Barang</h1>
<table border="1">
    <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $data['barang']['nama_barang']; ?></td>
            <td><?= $data['barang']['harga']; ?></td>
            <td><?= $data['barang']['stok']; ?></td>

        </tr>
    </tbody>
</table>