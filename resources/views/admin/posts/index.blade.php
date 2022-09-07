@extends('admin.layouts.app')

@section('title', 'Lista Posts')

@section('content')

    <a href="{{ route('posts.create') }}">Criar Novo Post</a>
    <hr>

    @if(session('sucess'))
        <div>
            {{ session('sucess') }}
        </div>
    @endif

    <form action="{{ route('posts.search') }}" method="post">
        @csrf
        <input type="text" name="search" placeholder="Pesquisar:">
        <button type="submit">Filtrar</button>
    </form>

    <h1>Posts Registrados</h1>

    @foreach ($posts as $post)
        <p>
            <img src="{{ url("storage/{$post->image}") }}" alt="{{ $post->title }}" style="max-width:100px;">
            {{ $post->title }}
            [
                <a href="{{ route('posts.show', $post->id) }}">Ver</a>
                <a href="{{ route('posts.edit', $post->id) }}">Editar</a>
            ]
        </p>
    @endforeach

    <hr>

    @if (isset($filters))
        {{ $posts->appends($filters)->links() }}
    @else
        {{ $posts->links() }}
    @endif

@endsection