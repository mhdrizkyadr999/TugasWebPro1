<h1>Data Barang</h1>
<br>

<?php if(isset($_SESSION['status'])) { ?>
<p><?= $_SESSION['status']; ?></p>
<?php unset($_SESSION['status']); ?>
<?php } ?>


<br>
<a href="<?= BASEURL; ?>/databarang/tambah">Tambah Data</a>
<table border="1">
    <thead>
        <tr>
            <th>Nama Barang</th>
            <th>action</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach($data['barang'] as $barang) : ?>
        <tr>
            <td><?= $barang['nama_barang']; ?></td>
            <td><a href="<?= BASEURL; ?>/databarang/detail/<?= $barang['id']; ?>">Detail</a>
                | <a href="<?= BASEURL; ?>/databarang/update/<?= $barang['id']; ?>">Update</a>
                | <a href="<?= BASEURL; ?>/databarang/delete/<?= $barang['id']; ?>">Delete</a>
            </td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>