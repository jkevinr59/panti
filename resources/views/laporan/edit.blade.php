@extends('adminlte::page')

@section('title', 'Panti Asuhan Anugrah')

@section('content_header')
    <h1>Edit Data Laporan</h1>
@stop

@section('content')

    <div class="card card-primary">

        <div class="card-header">
            Form Edit
        </div>
        <form action="{{route('laporan.update',[$model->id_anak,$model->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value='PUT'>
            <div class="card-body">
                @include('laporan.form_edit',$model)
                <input type="submit" value="Update" class="btn btn-success">
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
            $( "#tanggal_laporan" ).daterangepicker({
                
                singleDatePicker: true,
                autoApply:true,
                locale:{
                    format: 'YYYY-MM-DD',
                },
            });
            $('#tanggal_laporan').on('apply.daterangepicker',function(ev,picker){
                $(this).val(picker.startDate.format('YYYY-MM-DD'));
            })
        } );
    </script>
@stop