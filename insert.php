<h1>TAMBAH BARANG</h1>

<form action="<?= BASEURL; ?>/databarang/tambahStore" method="POST">
    <label>Nama Barang :</label>
    <input type="text" name="nama_barang" id="nama_barang">
    <br>
    <label>Harga :</label>
    <input type="number" name="harga" id="harga">
    <br>
    <label>Stok :</label>
    <input type="number" name="stok" id="stok">
    <br>
    <button type="submit" name="submit">Tambah</button>


</form>