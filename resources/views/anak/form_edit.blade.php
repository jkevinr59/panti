<div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" class="form-control" value="{{$model->nama}}">
</div>
<div class="form-group">
    <label for="tempat_lahir">Tempat Lahir</label>
    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{$model->tempat_lahir}}">
</div>
<div class="form-group">
    <label for="tanggal_lahir">Tanggal Lahir</label>
    <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{$model->tanggal_lahir}}">
</div>
<div class="form-group">
    <label for="nik">NIK</label>
    <input type="text" name="nik" id="nik" class="form-control" value="{{$model->nik}}">
</div>
<div class="form-group">
    <label for="jenis_kelamin">Jenis Kelamin</label>
    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
        <option value="L" @if($model->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
        <option value="P" @if($model->jenis_kelamin == 'P') selected @endif>Perempuan</option>
    </select>
</div>
<div class="form-group">
    <label for="sekolah">Sekolah</label>
    <input type="text" name="sekolah" id="sekolah" class="form-control" value="{{$model->sekolah}}">
</div>
<div class="form-group">
    <label for="asal">Asal</label>
    <input type="text" name="asal" id="asal" class="form-control" value="{{$model->asal}}">
</div>
@if ($model->foto);
    <img src="{{$model->foto->path}}" alt="Foto anak" srcset="" width="120" height="160">
@endif
<div class="form-group">
    <label for="foto">Foto</label>
    <input type="file" name="foto" id="foto" class="form-control">
</div>
