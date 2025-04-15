<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Transaksi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f2f2f2;
            padding: 40px;
        }

        .container {
            max-width: 600px;
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

        label {
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
        }

        input[type="date"] {
            padding: 8px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #218838;
        }

        .cancel-btn {
            display: inline-block;
            text-decoration: none;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #dc3545;
            color: white;
            border-radius: 8px;
            text-align: center;
        }

        .cancel-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Transaksi</h2>

    <?php echo form_open('transaksi/update/' . $transaksi['id']); ?>
    
    <label for="jenis">Jenis Transaksi</label>
    <select name="jenis" id="jenis" required>
        <option value="masuk" <?= ($transaksi['jenis'] == 'pemasukan') ? 'selected' : ''; ?>>Pemasukan</option>
        <option value="keluar" <?= ($transaksi['jenis'] == 'pengeluaran') ? 'selected' : ''; ?>>Pengeluaran</option>
    </select>

    <label for="jumlah">Jumlah</label>
    <input type="number" name="jumlah" id="jumlah" value="<?= $transaksi['jumlah']; ?>" required />

    <label for="keterangan">Keterangan</label>
    <input type="text" name="keterangan" id="keterangan" value="<?= $transaksi['keterangan']; ?>" required />

    <label for="tanggal">Tanggal</label>
    <input type="date" name="tanggal" id="tanggal" value="<?= date('Y-m-d', strtotime($transaksi['tanggal'])); ?>" required />

    <button type="submit">Update Transaksi</button>
    
    <?php echo form_close(); ?>

    <a href="<?= site_url('transaksi') ?>" class="cancel-btn">Batal</a>
</div>

</body>
</html>
