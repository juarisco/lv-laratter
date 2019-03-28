@extends('layouts.app')

@section('content')
    <h3>Mensaje id: {{ $message->id }}</h3>
    <img src="{{ $message->image }}" alt="" class="img-thumbnail">
    <p class="card-text">
        {{ $message->content }}
        <small class="text-muted">{{ $message->created_at }}</small>
    </p>
@endsection