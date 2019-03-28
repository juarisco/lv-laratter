@extends('layouts.app')

@section('content')

<div class="jumbotron text-center">
    <h1>Laratter</h1>
    <nav>
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
        </ul>
    </nav>
</div>

<div class="row">
    <form action="/messages/create" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="form-group {{ $errors->has('message') ? 'has-danger' : '' }}">
            <input type="text" name="message" class="form-control" placeholder="Qué estás pensando?">
            @if ($errors->has('message'))
                @foreach($errors->get('message') as $error)
                    <div class="form-control-feedback">{{ $error }}</div>
                @endforeach
            @endif
            {{-- <input type="file" class="form-control-file" name="image"> --}}
        </div>
    </form>
</div>   

<div class="row">
    @forelse ($messages as $message)
        <div class="col-6">
            <img src="{{ $message->image }}" alt="" class="img-thumbnail">
            <p class="card-text">
                {{ $message->content }}
                <a href="/messages/{{ $message->id }}">Leer mas</a>
            </p>
        </div>
    @empty
        <p>No hay mensajes destacados.</p>
    @endforelse
</div>

@endsection