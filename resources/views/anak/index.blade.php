@extends('adminlte::page')

@section('title', 'Panti Asuhan Anugrah')

@section('content_header')
    <h1>Daftar Anak</h1>
@stop

@section('content')

    <a class='btn btn-primary float-right mb-3' href="{{route('anak.create')}}"><i class="fa fa-plus"></i> Tambah Anak</a>
    <table class="table" id="dataTables">
        <thead>
            <tr>
                <td>Nama</td>
                <td>Usia</td>
                <td>Jenis Kelamin</td>
                <td>Asal</td>
                <td>NIK</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $row)
                <tr>
                    <td>{{$row->nama}}</td>
                    <td>{{$row->usia}}</td>
                    <td>{{$row->jenis_kelamin}}</td>
                    <td>{{$row->asal}}</td>
                    <td>{{$row->nik}}</td>
                    <td>
                        <a href="{{route('anak.edit',$row->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('laporan.index',$row->id)}}" class="btn btn-primary">Laporan</a>
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