<h2>Tambah User</h2>
<form method="post" action="<?= site_url('admin/storeUser') ?>">
    <label>Username</label>
    <input name="username" required><br>

    <label>Password</label>
    <input name="password" type="password" required><br>

    <label>Role</label>
    <select name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option
    </select><br>

    <button type="submit">Simpan</button>
</form>
