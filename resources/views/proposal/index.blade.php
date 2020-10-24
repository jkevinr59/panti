@extends('adminlte::page')

@section('title', 'Panti Asuhan Anugrah')

@section('content_header')
    <h1>Daftar Proposal Donasi</h1>
@stop

@section('content')

    <table class="table" id="dataTables">
        <thead>
            <tr>
                <td>Nama Donatur</td>
                <td>Email</td>
                <td>Nama Anak</td>
                <td>Status</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $row)
                <tr>
                    <td>{{($row->donatur)?$row->donatur->name:""}}</td>
                    <td>{{($row->donatur)?$row->donatur->email:""}}</td>
                    <td>{{($row->anak)?$row->anak->nama:""}}</td>
                    <td>
                        @switch($row->is_verified)
                            @case(0)
                                <span>Belum disetujui</span>    
                                @break
                            @case(1)
                                <span class="text-success">Disetujui</span>
                                @break
                            @case(2)
                                <span class="text-danger">Ditolak</span>
                                @break
                            @default
                                
                        @endswitch
                    </td>
                    <td>
                        @if ($row->is_verified == 0)
                            <a href="{{route('proposal.verify',$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
                            <a href="{{route('proposal.reject',$row->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"</a>
                        @endif
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