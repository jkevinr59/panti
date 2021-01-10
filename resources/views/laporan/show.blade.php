@extends('adminlte::page')

@section('title', 'Panti Asuhan Anugrah')

@section('content_header')
<h3>Laporan Anak: {{$anak->nama}}</h3>
@if (isset($monthName))
<h4>Periode : {{$monthName}} - {{$year}}</h4>
@endif
@stop

@section('content')

<div class="row">
    <div class="col-12">
        <div class="col-12 mb-1">
            <select name="month" id="month" class="form form-control">
                <option value="1" {{($month==1)?'selected':""}}>Januari</option>
                <option value="2" {{($month==2)?'selected':""}}>Februari</option>
                <option value="3" {{($month==3)?'selected':""}}>Maret</option>
                <option value="4" {{($month==4)?'selected':""}}>April</option>
                <option value="5" {{($month==5)?'selected':""}}>Mei</option>
                <option value="6" {{($month==6)?'selected':""}}>Juni</option>
                <option value="7" {{($month==7)?'selected':""}}>Juli</option>
                <option value="8" {{($month==8)?'selected':""}}>Agustus</option>
                <option value="9" {{($month==9)?'selected':""}}>September</option>
                <option value="10" {{($month==10)?'selected':""}}>Oktober</option>
                <option value="11" {{($month==11)?'selected':""}}>November</option>
                <option value="12" {{($month==12)?'selected':""}}>Desember</option>
            </select>
        </div>
        <div class="col-12 mb-3">
            <select name="year" id="year" class="form form-control">
                @for ($i = 2019; $i <= date('Y'); $i++)
                    <option value="{{$i}}" {{($year==$i)?'selected':""}}>{{$i}}</option>                
                @endfor
            </select>
        </div>

        <form action="{{route('laporan.show',$id)}}" method="get" id="filter_form">
            <input type="hidden" name="month" value="default" id="filter_month">
            <input type="hidden" name="year" value="default" id="filter_year">
        </form>
        <form action="{{route('laporan.export',$id)}}" method="get" id="export_form">
            <input type="hidden" name="month" value="default" id="export_month">
            <input type="hidden" name="year" value="default" id="export_year">
        </form>
        <button id="export_button" class='btn btn-info float-right mb-3 mr-1'><i class="fa fa-download"></i> Unduh</button>
        <a class='btn btn-danger float-right mb-3 mr-1' href="{{route('anak.my_anak')}}"><i class="fa fa-arrow-left"></i> Kembali</a>
        <button id="filter_button" class='btn btn-primary float-right mb-3 mr-1'><i class="fa fa-search"></i> Cari</button>
    </div>
</div>
<div class="card card-outline card-primary">
    <div class="card-header d-flex">
        <h1 >Laporan</h1>
        <ul class="nav nav-pills ml-auto p-2">
            <li class="nav-item">
                <a class='nav-link nav-link active' data-toggle="tab" href="#laporan_akademis">Akademis</a>
            </li>
            <li class="nav-item">
                <a class='nav-link' data-toggle="tab" href="#laporan_non_akademis">Non Akademis</a>
            </li>
            <li class="nav-item">
                <a class='nav-link' data-toggle="tab" href="#laporan_lain_lain">Lain Lain</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="laporan_akademis">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table" id="dataTables_akademis" width="100%">
                                <thead>
                                    <tr>
                                        <td>Tanggal Laporan</td>
                                        <td>Deskripsi</td>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="laporan_non_akademis">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table" id="dataTables_non_akademis" width="100%">
                                <thead>
                                    <tr>
                                        <td>Tanggal Laporan</td>
                                        <td>Deskripsi</td>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="laporan_lain_lain">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table" id="dataTables_lain_lain" width="100%">
                                <thead>
                                    <tr>
                                        <td>Tanggal Laporan</td>
                                        <td>Deskripsi</td>
                                        <td>File</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($laporan_lain_lain as $row)
                                        <tr>
                                            <td>{{date('d-m-Y',strtotime($row->tanggal_laporan))}}</td>
                                            <td>{{$row->deskripsi}}</td>
                                            @if ($row->file)
                                                <td>
                                                    
                                                    @if(in_array($row->file->ekstensi,['jpeg','jpg','png','JPG','JPEG','PNG']))
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <img src="{{$row->file->path}}" alt="Data" width="100px">
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <a href="{{$row->file->path}}" class="btn btn-primary">Unduh</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            @else
                                                <td>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>






@stop

@section('css')
    <link rel="stylesheet" href="{{url('vendor/datatables/css/dataTables.bootstrap4.min.css')}}">
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="{{url('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script> console.log('Hi!'); </script>
    <script> 
        $(document).ready(function () {
            $('#dataTables_akademis').DataTable();   
            $('#dataTables_non_akademis').DataTable();   
            $('#dataTables_lain_lain').DataTable();   
        });
        $('#filter_button').click(function (e) { 
            e.preventDefault();
            let month = $('#month').val();
            let year = $('#year').val();
            $('#filter_month').val(month);
            $('#filter_year').val(year);
            $('#filter_form').submit();
        });
        $('#export_button').click(function (e) { 
            e.preventDefault();
            let month = $('#month').val();
            let year = $('#year').val();
            $('#export_month').val(month);
            $('#export_year').val(year);
            $('#export_form').submit();
        });
    </script>
@stop