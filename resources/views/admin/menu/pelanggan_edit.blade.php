<div class="form-group">
    <label for="sel-role-edit">Role</label>
    <select style="width:100%;" class="form-control" name="role_id" id="sel-role-edit" onchange="roleselectedit()">
        <option value="1" {{ $user->role_id==1?'selected':'' }} >Admin</option>
        <option value="2" {{ $user->role_id==2?'selected':'' }}>Pencatat Meter Air</option>
        <option value="3" {{ $user->role_id==3?'selected':'' }}>Kasir</option>
        <option value="4" {{ $user->role_id==4?'selected':'' }}>Pelanggan</option>
    </select>
</div>
<div id="wrapper-other-edit">
    <div class="form-group">
        <label for="txt-username-edit" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" id="txt-username-edit" value="{{ $user->username }}">
    </div>
    <div class="form-group">
        <label for="inputPelanggan2" class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
</div>
<div class="form-group" id="wrapper-pelanggan-edit" style="display: none;">
    <label for="inputPelanggan2" class="form-label">No Pelanggan</label>
    <input type="text" class="form-control" id="inputPelanggan2"  disabled value="{{ $user->username }}">
</div>
<div class="form-group">
    <label for="inputNama2" class="form-label">Nama</label>
    <input type="text" class="form-control" id="inputNama2" name="nama" required value="{{ $user->nama }}">
</div>
<div class="form-group">
    <label for="inputNoTelp2" class="form-label">No Telp</label>
    <input type="text" class="form-control" id="inputNoTelp2" name="no_telp" required value="{{ $user->no_telp }}">
</div>
<div class="form-group">
    <label for="inputAlamat2" class="form-label">Alamat</label>
    <input type="text" class="form-control" id="inputAlamat2" name="alamat" required value="{{ $user->alamat }}">
</div>
<input type="hidden" class="form-control" id="inputId" name="id" required value="{{ $user->id }}"><br>

<script>
    roleselectedit();
</script>