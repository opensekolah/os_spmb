<form method="POST" action="/install">
    @csrf

    <h3>Database</h3>
    <input name="db_name" placeholder="Database Name">
    <input name="db_user" placeholder="Username">
    <input name="db_pass" placeholder="Password">

    <h3>Sekolah</h3>
    <input name="school_name" placeholder="Nama Sekolah">

    <h3>Admin</h3>
    <input name="admin_email" placeholder="Email">
    <input type="password" name="admin_password" placeholder="Password">

    <button type="submit">Install</button>
</form>