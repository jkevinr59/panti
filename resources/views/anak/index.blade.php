@extends('adminlte::page')

@section('title', 'Panti Asuhan Anugrah')

@section('content_header')
    <h1>Daftar Anak</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <a class='btn btn-primary float-right mb-3' href="{{route('anak.create')}}"><i class="fa fa-plus"></i> Tambah Anak</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table" id="dataTables">
                <thead>
                    <tr>
                        <td>Nama</td>
                        <td>Usia</td>
                        <td>Jenis Kelamin</td>
                        <td>Sekolah</td>
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
                            <td>{{$row->sekolah}}</td>
                            <td>{{$row->asal}}</td>
                            <td>{{$row->nik}}</td>
                            <td>
                                <a href="{{route('anak.edit',$row->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{route('laporan.index',['id' => $row->id,'type'=>'akademis'])}}" class="btn btn-sm btn-primary">Akademis</a>
                                <a href="{{route('laporan.index',['id' => $row->id,'type'=>'non_akademis'])}}" class="btn btn-sm btn-primary">Non Akademis</a>
                                <a href="{{route('laporan.index',['id' => $row->id,'type'=>'raport'])}}" class="btn btn-sm btn-primary">Raport</a>
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