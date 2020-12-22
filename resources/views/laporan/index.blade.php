@extends('adminlte::page')

@section('title', 'Panti Asuhan Anugrah')

@section('content_header')
    @switch($type)
        @case('akademis')
        <h1>Laporan Akademis Anak : {{$anak->nama}}</h1>
            @break
        @case('non_akademis')
        <h1>Laporan Non Akademis Anak : {{$anak->nama}}</h1>
            @break
        @case('lain_lain')
        <h1>Laporan Lain-Lain : {{$anak->nama}}</h1>
            @break
        @default
    @endswitch
@stop

@section('content')

<div class="row">
    <div class="col-12">
        <a class='btn btn-primary float-right mb-3' href="{{route('laporan.create',[$id,$type])}}"><i class="fa fa-plus"></i> Tambah Laporan</a>
        <a class='btn btn-danger float-right mb-3 mr-1' href="{{route('anak.index')}}"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table" id="dataTables">
                <thead>
                    <tr>
                        <td>Tanggal Laporan</td>
                        <td>Deskripsi</td>
                        @if ($type == 'raport')
                            <td>File</td>
                        @endif
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($model as $row)
                        <tr>
                            <td>{{date('d-m-Y',strtotime($row->tanggal_laporan))}}</td>
                            <td>{{$row->deskripsi}}</td>
                            @if ($type == 'raport'||$type == 'lain_lain')
                                @if ($row->file)
                                    <td>
                                        <a href="{{$row->file->path}}">Open</a>
                                    </td>
                                @else
                                    <td>
                                    </td>
                                @endif
                            @endif
                            <td>
                                <a href="{{route('laporan.edit',[$row->id_anak,$row->id,$type])}}" class="btn btn-primary">Edit</a>
                                {{-- <a href="#" class="btn btn-primary">Laporan</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
            $('#dataTables').DataTable();   
        });
    </script>
@stop