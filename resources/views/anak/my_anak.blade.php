@extends('adminlte::page')

@section('title', 'Panti Asuhan Anugrah')

@section('content_header')
    <h1>Anak Saya</h1>
@stop

@section('content')

    <div class="row">
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
                                <a href="{{route('laporan.show',$row->id)}}" class="btn btn-sm btn-primary">Laporan</a>
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