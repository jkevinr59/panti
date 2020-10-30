@extends('adminlte::page')

@section('title', 'Panti Asuhan Anugrah')

@section('content_header')
    <h1>Laporan Anak</h1>
@stop

@section('content')

<div class="row">
    <div class="col-12">
        <a class='btn btn-primary float-right mb-3' href="{{route('laporan.create',$id)}}"><i class="fa fa-plus"></i> Tambah Laporan</a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <table class="table" id="dataTables">
            <thead>
                <tr>
                    <td>Tanggal Laporan</td>
                    <td>Jenis Laporan</td>
                    <td>Deskripsi</td>
                    <td>File</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach($model as $row)
                    <tr>
                        <td>{{date('d-m-Y',strtotime($row->tanggal_laporan))}}</td>
                        <td>{{($row->jenis_laporan=='akademis')?"Akademis":"Non-Akademis"}}</td>
                        <td>{{$row->deskripsi}}</td>
                        @if ($row->file)
                            <td>
                                <a href="{{$row->file->path}}">Open</a>
                            </td>
                        @else
                            <td>
                            </td>
                        @endif
                        <td>
                            <a href="{{route('laporan.edit',[$row->id_anak,$row->id])}}" class="btn btn-primary">Edit</a>
                            {{-- <a href="#" class="btn btn-primary">Laporan</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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