@extends('adminlte::page')

@section('title', 'Panti Asuhan Anugrah')

@section('content_header')
    <h1>Ganti Password</h1>
@stop

@section('content')

    <div class="card ">
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss='alert' aria-hidden="true">X</button>
                <h5>Error</h5>
                {{Session::get('error')}}
            </div>
        @endif
        <form action="{{route('update_password')}}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="old_password">Password Lama</label>
                    <input type="password" name="old_password" id="old_password" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="new_password">Password Baru</label>
                    <input type="password" name="new_password" id="new_password" class="form-control" >
                </div>
                <input type="submit" value="Ganti" class="btn btn-success">
            </div>
        </form>

    </div>
@endsection