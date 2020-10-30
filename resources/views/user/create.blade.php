@extends('adminlte::page')

@section('title', 'Panti Asuhan Anugrah')

@section('content_header')
    <h1>Tambah Pengguna</h1>
@stop

@section('content')

    <div class="card card-primary">

        <div class="card-header">
            Form Create Pengguna
        </div>
        <form action="{{route('user.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('user.form')
                <input type="submit" value="Tambahkan" class="btn btn-success">
            </div>
        </form>

    </div>
@endsection

