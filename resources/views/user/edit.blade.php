@extends('adminlte::page')

@section('title', 'Panti Asuhan Anugrah')

@section('content_header')
    <h1>Edit Data Pengguna</h1>
@stop

@section('content')

    <div class="card card-primary">

        <div class="card-header">
            Form Edit
        </div>
        <form action="{{route('user.update',$model->id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value='PUT'>
            <div class="card-body">
                @include('user.form_edit',$model)
                <input type="submit" value="Update" class="btn btn-success">
            </div>
        </form>

    </div>
@endsection
