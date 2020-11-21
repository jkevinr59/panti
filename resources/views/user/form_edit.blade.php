<div class="form-group">
    <label for="name">Nama</label>
    <input type="text" name="name" id="name" class="form-control" value="{{$model->name}}">
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="{{$model->email}}">
</div>
@role('superadmin')
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" value="{{$model->password}}">
    </div>
@endrole
<div class="form-group">
    <label for="nomor_hp">Nomor HP</label>
    <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" value="{{$model->nomor_hp}}">
</div>


<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="is_active">Status</label>
            <select name="is_active" id="is_active" class="form-control">
                <option value="1"  @if($model->is_active==1) selected @endif>Aktif</option>
                <option value="0"  @if($model->is_active==0) selected @endif>Tidak Aktif</option>
            </select>
        </div>
    </div>
    @role('superadmin')
    <div class="col-6">
        <div class="form-group">
            <label for="role">Peran</label>
            <select name="role" id="role" class="form-control">
                <option value="superadmin" @if($model->hasRole('superadmin')) selected @endif>Super Admin</option>
                <option value="pengurus" @if($model->hasRole('pengurus')) selected @endif>Pengurus</option>
                <option value="donatur" @if($model->hasRole('donatur')) selected @endif>Donatur</option>
            </select>
        </div>
    </div>
    @endrole
</div>




