<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Daftar User</h4>
            <a href="<?= site_url('admin/createUser') ?>" class="btn btn-success">+ Tambah User</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $i => $u): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $u['username'] ?></td>
                            <td><?= ucfirst($u['role']) ?></td>
                            <td>
                                <a href="<?= site_url('admin/editUser/'.$u['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="<?= site_url('admin/deleteUser/'.$u['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus user ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <?php if (empty($users)): ?>
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada user.</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
