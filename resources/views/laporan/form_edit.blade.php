

<div class="form-group">
    <label for="tanggal_laporan">Tanggal Laporan</label>
    <input type="text" name="tanggal_laporan" id="tanggal_laporan" class="form-control" value="{{$model->tanggal_laporan}}">
</div>

<div class="form-group">
    <label for="jenis_laporan">Jenis Laporan</label>
    <select name="jenis_laporan" id="jenis_laporan" class="form-control">
        <option value="akademis" @if($model->jenis_laporan == 'akademis') selected @endif>Akademis</option>
        <option value="non_akademis" @if($model->jenis_laporan == 'non_akademis') selected @endif>Non Akademis</option>
    </select>
</div>
<div class="form-group">
    <label for="deskripsi">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">
        {{$model->deskripsi}}
    </textarea>
</div>
<div class="form-group">
    <label for="file">File Pendukung (Rapor dsb)</label>
    <input type="file" name="file" id="file" class="form-control">
</div>
