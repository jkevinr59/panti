@extends('adminlte::page')

@section('title', 'Panti Asuhan Anugrah')

@section('content_header')

    @role('superadmin')
    <h1>Daftar Pengguna</h1>
    @endrole
    @role('pengurus')
    <h1>Daftar Donatur</h1>
    @endrole
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            @role('superadmin')
            <a class='btn btn-primary float-right mb-3' href="{{route('user.create')}}"><i class="fa fa-plus"></i> Tambah Pengguna</a>
            @endrole
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table" id="dataTables">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nama</td>
                        <td>Email</td>
                        <td>Nomor HP</td>
                        <td>Peran</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($model as $row)
                        <tr>

                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->nomor_hp}}</td>
                            @if ($row->hasRole('superadmin'))
                                <td>Super Admin</td>
                            @elseif ($row->hasRole('pengurus'))
                                <td>Pengurus</td>
                            @elseif ($row->hasRole('donatur'))
                                <td>Donatur</td>
                            @endif
                            <td>
                                <a href="{{route('user.edit',$row->id)}}" class="btn btn-sm btn-primary">Edit</a>
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