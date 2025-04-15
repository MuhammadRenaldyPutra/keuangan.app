<h2>Data Transaksi</h2>
<a href="/transaksi/create">Tambah</a>
<table>
    <tr><th>Jenis</th><th>Jumlah</th><th>Keterangan</th><th>Tanggal</th><th>Aksi</th></tr>
    <?php foreach ($transaksi as $t): ?>
        <tr>
            <td><?= $t['jenis'] ?></td>
            <td><?= $t['jumlah'] ?></td>
            <td><?= $t['keterangan'] ?></td>
            <td><?= $t['tanggal'] ?></td>
            <td>
                <a href="/transaksi/edit/<?= $t['id'] ?>">Edit</a>
                <a href="/transaksi/delete/<?= $t['id'] ?>">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
