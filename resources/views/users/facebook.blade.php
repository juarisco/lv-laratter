@extends('layouts.app')

@section('content')
<form action="/auth/facebook/register" method="post">
    {{ csrf_field() }}

    <div class="card mt-3">
        <div class="card-body"> 
            <img src="{{ $user->avatar }}" class="img-thumbnail" alt="...">
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="name" class="form-control-label">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="email" class="form-control-label">Email address</label>
                <input type="text" class="form-control" name="email" value="{{ $user->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="username" class="form-control-label">Nombre de usuario</label>
                <input type="text" class="form-control" name="username" value="{{ old('username') }}" autofocus>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" type="submit">Registrarse</button>
        </div>
    </div>
</form>
@endsection