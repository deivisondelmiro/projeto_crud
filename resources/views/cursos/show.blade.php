@extends('layouts.main')

@section('title', $curso->title_curso)

@section('content')
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/cursos/{{ $curso->image }}" alt="{{ $curso->title_curso}}" class="img-fluid">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $curso->title_curso }}</h1>
                <p>{{$curso->duration}}</p>
                <p>{{$curso->level}}</p>
                @if(!$hasUserJoined)
                    <form action="/cursos/join/{{ $curso->id }}" method="POST">
                        @csrf
                        <a href="/cursos/join/{{ $curso->id }}" class="btn btn-primary" id="curso-submit" onclick="event.preventDefault(); this.closest('form').submit();">Inscrever-se</a>
                    </form>
                @else
                    <p class="already-joined-msg">Você já está matriculado neste curso!</p>
                @endif
                <ul id="items-list">
                    @foreach($curso->items as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Descrição:</h3>
                <p class="curso-description">{{ $curso->description}}</p>
            </div>
        </div>
    </div>
@endsection