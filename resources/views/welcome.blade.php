@extends('layouts.main')

@section('title', 'Cursos')

@section('content')


<div id="cursos-container" class="col-md-12">
    <h2>Cursos</h2>
    <p class=subtitle>Veja os cursos em alta</p>
    <div id="cards-container" class="row">
        @foreach($cursos as $curso)
            <div class="card col-md-3">
                <img src="img/cursos/{{ $curso->image }}" alt="{{ $curso->title_curso }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $curso->title_curso }} - <span>[{{ $curso->duration }}]</span></h5>
                    <p class="card-level">Nível: {{ $curso->level }}</p>
                    <p class="card-description">{{ $curso->description }}</p>
                    <a href="/cursos/{{ $curso->id }}" class="btn btn-primary">Ver mais...</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection