@extends('adminlte::page')

@section('title', 'Panti Asuhan Anugrah')

@section('content_header')
    <h1>Proposal Saya</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            {{-- <a class='btn btn-primary float-right mb-3' href="{{route('anak.create')}}"><i class="fa fa-plus"></i> Tambah Anak</a> --}}
        </div>
    </div>
    <div class="row">
    @foreach ($model as $item)
            <div class="col-6-md">
                @php
                    $cardStatus = 'card-primary';
                    if($item->is_verified ==1){
                        $cardStatus = 'card-success';
                    }
                    else if($item->is_verified == 2){
                        $cardStatus = 'card-danger';
                    }
                @endphp
                <div class="card {{$cardStatus}} mt-1">
                    <div class="card-header">
                        <h3>{{$item->anak->nama}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4"><h4>Status</h4></div>
                                    @switch($item->is_verified)
                                        @case(0)
                                        <div class="col-8"><h4>Menunggu Persetujuan</h4></div>
                                            @break
                                        @case(1)
                                        <div class="col-8"><h4>Disetujui</h4></div>
                                            @break
                                        @case(2)
                                        <div class="col-8"><h4>Ditolak</h4></div>        
                                            @break
                                        @default
                                    @endswitch
                                    
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
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