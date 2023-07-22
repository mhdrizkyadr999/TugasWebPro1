<h1>Update Data BARANG</h1>

<form action="<?= BASEURL; ?>/databarang/updateStore" method="POST">
    <label>Nama Barang :</label>
    <input type="hidden" name="id" id="id" value="<?= $data['barang']['id']; ?>">
    <input type="text" name="nama_barang" id="nama_barang" value="<?= $data['barang']['nama_barang']; ?>">
    <br>
    <label>Harga :</label>
    <input type="number" name="harga" id="harga" value="<?= $data['barang']['harga']; ?>">
    <br>
    <label>Stok :</label>
    <input type="number" name="stok" id="stok" value="<?= $data['barang']['stok']; ?>">
    <br>
    <button type="submit" name="submit">Update</button>


</form>