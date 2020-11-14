

<div class="form-group">
    <label for="tanggal_laporan">Tanggal Laporan</label>
    <input type="text" name="tanggal_laporan" id="tanggal_laporan" class="form-control" value="{{$model->tanggal_laporan}}">
</div>

<input type="hidden" name="jenis_laporan" value="{{$type}}">
<div class="form-group">
    <label for="deskripsi">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">
        {{$model->deskripsi}}
    </textarea>
</div>
<div class="form-group" {{($type!="raport")?"style='display: none'":""}}>
    <label for="file">File Pendukung (Rapor dsb)</label>
    <input type="file" name="file" id="file" class="form-control">
</div>
