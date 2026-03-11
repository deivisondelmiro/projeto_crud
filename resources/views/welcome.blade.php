@extends('layouts.main')

@section('title', 'Cursos')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um curso</h1>
    <form action="">
        <input type="text" name="search" id="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="cursos-container" class="col-md-12">
    <h2>Cursos</h2>
    <p class=subtitle>Veja os cursos em alta</p>
    <div id="cards-container" class="row">
        @foreach($cursos as $curso)
            <div class="card col-md-3">
                <img src="#fs" alt="{{ $curso->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $curso->title_curso }}</h5>
                    <p class="card-description">{{ $curso->description }}</p>
                    <a href="#" class="btn btn-primary">Ver mais...</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection