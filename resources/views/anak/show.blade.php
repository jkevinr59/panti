@extends('adminlte::page')

@section('title', 'Panti Asuhan Anugrah')

@section('content_header')
    <h1>Daftar Anak</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            {{-- <a class='btn btn-primary float-right mb-3' href="{{route('anak.create')}}"><i class="fa fa-plus"></i> Tambah Anak</a> --}}
        </div>
    </div>
    <div class="row">
    @foreach ($model as $item)
            <div class="col-md-6 ">
                <div class="card card-success mt-1">
                    <div class="card-header">
                        <h3>{{$item->nama}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8-md">
                                <div class="row">
                                    <div class="col-6"><h5>Usia</h5></div>
                                    <div class="col-6"><h5>{{$item->usia}} Tahun</h5></div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><h5>Sekolah</h5></div>
                                    <div class="col-6"><h5>{{$item->sekolah}}</h5></div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><h5>Asal</h5></div>
                                    <div class="col-6"><h5>{{$item->asal}}</h5></div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><h5>Jenis Kelamin</h5></div>
                                    <div class="col-6"><h5>{{$item->jenis_kelamin=='L'?'Laki-Laki':'Perempuan'}}</h5></div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><h5>NIK</h5></div>
                                    <div class="col-6"><h5>{{$item->nik}}</h5></div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><h5>Tempat Tanggal Lahir</h5></div>
                                    <div class="col-6"><h5>{{$item->tempat_lahir}} , {{date('d-m-Y',strtotime($item->tanggal_lahir))}}</h5></div>
                                </div>
                            </div>
                            <div class="col-4-md">
                                @if ($item->foto)
                                    <img src="{{$item->foto->path}}" alt="Foto" style="width: 100%">
                                @endif
                                <a href="{{route('anak.donate',$item->id)}}" class="btn btn-outline-primary btn-block mt-2" href="{{route('anak.show')}}">Proposal Donasi</a>
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