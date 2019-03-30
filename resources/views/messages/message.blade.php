<img src="{{ $message->image }}" alt="" class="img-thumbnail">
<p class="card-text">
    <div class="text-muted">Written by <a href="/{{ $message->user->username }}"> {{ $message->user->name }}</a></div>
    {{ $message->content }}
    <a href="/messages/{{ $message->id }}">Leer mas</a>
</p>