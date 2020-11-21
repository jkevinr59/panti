@extends('adminlte::page')

@section('title', 'Panti Asuhan Anugrah Oke')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss='alert' aria-hidden="true">X</button>
            <h5>Success</h5>
            {{Session::get('success')}}
        </div>
    @elseif (Session::has('error'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss='alert' aria-hidden="true">X</button>
            <h5>Sucess</h5>
            {{Session::get('error')}}
        </div>
    @endif
    <h3>Selamat datang di panti anugrah</h3>
    @if (!Auth::check())
        <a href="{{url('login')}}" class="btn btr-primary">Login di sini</a>
    @endif

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop