@extends('layout.master')

@section('content')

    <form method="post" action="{{ route('posts.store') }}">
        {{ csrf_field() }}<br>

        <div class="col-lg-4">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control" placeholder="Nombre" name="name" value="@if(Session::has('error')) {{old('name')}} @endif">
            </div>
        </div>
        <br>

        <div class="col-lg-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Descipción</span>
                </div>
                <textarea class="form-control" name="description">@if(Session::has('error')) {{old('description')}} @endif</textarea>
            </div>
        </div>
        <br><br>

        <div style="margin-left: 100px;">
            <button class="btn btn-danger" title="Crear" type="submit">Crear</button>
        </div>

    </form>
@endsection