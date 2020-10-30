@extends('adminlte::page')

@section('title', 'Panti Asuhan Anugrah Oke')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

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