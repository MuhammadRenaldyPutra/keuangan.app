<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Transaksi</h4>
            <a href="<?= site_url('transaksi/create') ?>" class="btn btn-success">+ Tambah</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transaksi as $t): ?>
                        <tr>
                            <td><?= ucfirst($t['jenis']) ?></td>
                            <td>Rp <?= number_format($t['jumlah'], 0, ',', '.') ?></td>
                            <td><?= $t['keterangan'] ?></td>
                            <td><?= date('d-m-Y', strtotime($t['tanggal'])) ?></td>
                            <td>
                                <a href="<?= site_url('transaksi/edit/'.$t['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="<?= site_url('transaksi/delete/'.$t['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus transaksi ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($transaksi)): ?>
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data transaksi.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Rekap Keuangan</h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total Pemasukan</span>
                    <strong class="text-success">Rp <?= number_format($total_pemasukan, 0, ',', '.') ?></strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total Pengeluaran</span>
                    <strong class="text-danger">Rp <?= number_format($total_pengeluaran, 0, ',', '.') ?></strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Saldo Akhir</span>
                    <strong class="text-primary">Rp <?= number_format($total_pemasukan - $total_pengeluaran, 0, ',', '.') ?></strong>
                </li>
            </ul>
        </div>
    </div>
</div>

</body>
</html>
