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
        <div class="form-group">

            <input id="message" type="text" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" placeholder="Qué estás pensando?" autofocus>

            @if ($errors->has('message'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('message') }}</strong>
                </span>
            @endif
            <input type="file" class="form-control-file" name="image">
        </div>
    </form>
</div>   

<div class="row">
    @forelse ($messages as $message)
        <div class="col-6">
            @include('messages.message')
        </div>
    @empty
        <p>No hay mensajes destacados.</p>
    @endforelse

    @if (count($messages))
        <div class="mt-3 mx-auto">
            {{ $messages->links('pagination::bootstrap-4') }}
        </div>
    @endif

</div>

@endsection