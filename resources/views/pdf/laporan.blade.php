<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .center-header{
            text-align: center;
        }
        .table{
            border-style: solid;
            border-color: #333;
            width: 100%;
            /* margin-left: 10%; */
            text-align: center;
            border-collapse: collapse;
        }
        .table th{
            border-style: solid;
            border-color: #333;
            background-color: #aaa;
        }
        .table td{
            border-style: solid;
            border-color: #333;
        }
        .page_break { page-break-before: always; }
    </style>
</head>
<body>
    <h2 class="center-header">LAPORAN AKADEMIK</h2>
    <h3 class="center-header">Nama: {{$anak->nama}}</h3>
    {{-- <h3 class="center-header">Tanggal: 10-08-2020 s/d 19/12/2020</h3> --}}



    <div style="height: 30px;"></div>
    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan_akademis as $row)
                <tr>
                    <td>{{date('d-m-Y',strtotime($row->tanggal_laporan))}}</td>
                    <td>{{$row->deskripsi}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="page_break"></div>

    <h2 class="center-header">LAPORAN NON AKADEMIK</h2>
    <h3 class="center-header">Nama: {{$anak->nama}}</h3>
    {{-- <h3 class="center-header">Tanggal: 10-08-2020 s/d 19/12/2020</h3> --}}



    <div style="height: 30px;"></div>
    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan_non_akademis as $row)
                <tr>
                    <td>{{date('d-m-Y',strtotime($row->tanggal_laporan))}}</td>
                    <td>{{$row->deskripsi}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="page_break"></div>

    <h2 class="center-header">LAMPIRAN GAMBAR</h2>
    <h3 class="center-header">Nama: {{$anak->nama}}</h3>
    {{-- <h3 class="center-header">Tanggal: 10-08-2020 s/d 19/12/2020</h3> --}}



    <div style="height: 30px;"></div>
    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan_lain_lain as $row)
                @if ($row->file)
                    @if(in_array($row->file->ekstensi,['jpeg','jpg','png','JPG','JPEG','PNG']))
                        <tr>
                            <td>{{date('d-m-Y',strtotime($row->tanggal_laporan))}}</td>
                            <td>{{$row->deskripsi}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <img src="{{$row->file->path}}" alt="Data" width="100px">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endif
            @endforeach
        </tbody>
        <p style="margin-top:10px;">
            <b><sup>*</sup>Lampiran File seperti rapor dapat diunduh melalui halaman web</b>

        </p>
    </table>

    
</body>
</html>