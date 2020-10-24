@extends('adminlte::page')

@section('title', 'Panti Asuhan Anugrah')

@section('content_header')
    <h1>Laporan Anak</h1>
@stop

@section('content')

    <a class='btn btn-primary float-right mb-3' href="{{route('laporan.create',$id)}}"><i class="fa fa-plus"></i> Tambah Laporan</a>
    <table class="table" id="dataTables">
        <thead>
            <tr>
                <td>Tanggal Laporan</td>
                <td>Jenis Laporan</td>
                <td>Deskripsi</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $row)
                <tr>
                    <td>{{date('d-m-Y',strtotime($row->tanggal_laporan))}}</td>
                    <td>{{($row->jenis_laporan=='akademis')?"Akademis":"Non-Akademis"}}</td>
                    <td>{{$row->deskripsi}}</td>
                    <td>
                        <a href="{{route('laporan.edit',[$row->id_anak,$row->id])}}" class="btn btn-primary">Edit</a>
                        {{-- <a href="#" class="btn btn-primary">Laporan</a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script> 
        $(document).ready(function () {
            $('#dataTables').DataTable();   
        });
    </script>
@stop