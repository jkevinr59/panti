@extends('adminlte::page')

@section('title', 'Panti Asuhan Anugrah')

@section('content_header')
    Laporan Anak
@stop

@section('content')

<div class="row">
    <div class="col-12">
        
        <a class='btn btn-danger float-right mb-3 mr-1' href="{{route('anak.my_anak')}}"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h1>Laporan Akademis</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <table class="table" id="dataTables_akademis">
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
<div class="card card-info">
    <div class="card-header">
        <h1>Laporan Non Akademis</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <table class="table" id="dataTables_non_akademis">
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

<div class="card card-success">
    <div class="card-header">
        <h1>Raport</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <table class="table" id="dataTables_raport">
                    <thead>
                        <tr>
                            <td>Tanggal Laporan</td>
                            <td>Deskripsi</td>
                            <td>File</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($laporan_raport as $row)
                            <tr>
                                <td>{{date('d-m-Y',strtotime($row->tanggal_laporan))}}</td>
                                <td>{{$row->deskripsi}}</td>
                                @if ($row->file)
                                    <td>
                                        <a href="{{$row->file->path}}">Open</a>
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
            $('#dataTables_raport').DataTable();   
        });
    </script>
@stop