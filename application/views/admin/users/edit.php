<h2>Edit User</h2>
<form method="post" action="<?= site_url('admin/updateUser/'.$user['id']) ?>">
    <label>Username</label>
    <input name="username" value="<?= $user['username'] ?>" required><br>

    <label>Password (Kosongkan jika tidak diubah)</label>
    <input name="password" type="password"><br>

    <label>Role</label>
    <select name="role">
        <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
        <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
    </select><br>

    <button type="submit">Update</button>
</form>
