<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Transaksi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f2f2f2;
            padding: 40px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .add-btn {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #ff6a6a;
            color: white;
        }

        .action-btn {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 4px;
            color: white;
            font-size: 14px;
        }

        .edit {
            background-color: #007bff;
        }

        .delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Daftar Transaksi</h2>

    <a class="add-btn" href="<?= site_url('transaksi/create') ?>">+ Tambah Transaksi</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($transaksi)): ?>
                <?php $no = 1; foreach ($transaksi as $t): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= ucfirst($t['jenis']) ?></td>
                        <td>Rp <?= number_format($t['jumlah'], 0, ',', '.') ?></td>
                        <td><?= $t['keterangan'] ?></td>
                        <td><?= date('d-m-Y', strtotime($t['tanggal'])) ?></td>
                        <td>
                            <a class="action-btn edit" href="<?= site_url('transaksi/edit/'.$t['id']) ?>">Edit</a>
                            <a class="action-btn delete" href="<?= site_url('transaksi/delete/'.$t['id']) ?>" onclick="return confirm('Yakin hapus transaksi ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align: center;">Belum ada data transaksi.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
