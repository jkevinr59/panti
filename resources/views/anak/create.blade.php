@extends('adminlte::page')

@section('title', 'Panti Asuhan Anugrah')

@section('content_header')
    <h1>Tambah Anak</h1>
@stop

@section('content')

    <div class="card card-primary">

        <div class="card-header">
            Form Create Anak
        </div>
        <form action="{{route('anak.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                @include('anak.form')
                <input type="submit" value="Tambahkan" class="btn btn-success">
            </div>
        </form>

    </div>
@endsection

@section('css')
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection
@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        console.log(moment().format('YYYY-MM-DD'));
        $( function() {
            $( "#tanggal_lahir" ).daterangepicker({
                
                singleDatePicker: true,
                autoApply:true,
                locale:{
                    format: 'YYYY-MM-DD',
                },
            });
            $('#tanggal_lahir').on('apply.daterangepicker',function(ev,picker){
                $(this).val(picker.startDate.format('YYYY-MM-DD'));
            })
        } );
    </script>
@stop