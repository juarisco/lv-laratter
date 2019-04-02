@extends('layouts.app')

@section('content')
    <h1>{{ $user->name }}</h1>
    <a class="btn btn-link" href="/{{ $user->username }}/follows">
        Sigue a <span class="badge badge-secondary">{{ $user->follows->count() }}</span>
    </a>
    
    <a class="btn btn-link" href="/{{ $user->username }}/followers">
        Siguidores <span class="badge badge-secondary">{{ $user->followers->count() }}</span>
    </a>

    @auth
        @if (Gate::allows('dms',$user))
            <form action="/{{ $user->username }}/dms" method="post">
                {{ csrf_field() }}

                <input type="text" name="message" class="form-control">
                <button type="submit" class="btn btn-success">Enviar DM</button>
            </form>
        @endif
        
        @if (Auth::user()->isFollowing($user))
            <form action="/{{ $user->username }}/unfollow" method="POST">
                {{ csrf_field() }}
                @if (session('success'))
                <span class="text-success">{{ session('success') }}</span>
                @endif
                <button type="submit" class="btn btn-danger">Stop Following</button>
            </form>
        @else
            <form action="/{{ $user->username }}/follow" method="POST">
                {{ csrf_field() }}
                @if (session('success'))
                <span class="text-success">{{ session('success') }}</span>
                @endif
                <button type="submit" class="btn btn-primary">Follow</button>
            </form>
        @endif
    @endauth

    <div class="row">
        @foreach ($user->messages as $message)
            <div class="col-6">
                @include('messages.message')
            </div>
        @endforeach
    </div>
@endsection