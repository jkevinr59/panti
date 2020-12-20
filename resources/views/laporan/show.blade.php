@extends('adminlte::page')

@section('title', 'Panti Asuhan Anugrah')

@section('content_header')
    Laporan Anak
@stop

@section('content')

<div class="row">
    <div class="col-12">
        
        <a class='btn btn-info float-right mb-3 mr-1' href="{{route('laporan.export',$id)}}"><i class="fa fa-download"></i> Unduh</a>
        <a class='btn btn-danger float-right mb-3 mr-1' href="{{route('anak.my_anak')}}"><i class="fa fa-arrow-left"></i> Kembali</a>
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
    </script>
@stop