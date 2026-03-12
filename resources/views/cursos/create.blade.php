@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

<div id="curso-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu curso</h1>
    <form action="/cursos" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title_curso">Curso:</label>
            <input type="text" class="form-control" id="title_curso" name="title_curso" placeholder="Curso de JavaScript">
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea class="form-control" id="description" name="description" placeholder="O que será abordado no curso?"></textarea>
        </div>
        <div class="form-group">
            <label for="duration">Duração:</label>
            <input type="text" name="duration" id="duration" class="form-control" placeholder="15h">
        </div>
        <div class="form-group">
            <label for="level">Nível:</label>
            <select name="level" id="level" class="form-control">
                <option value="basico">Básico</option>
                <option value="intermediario">Intermediário</option>
                <option value="avancado">Avançado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Imagem do curso:</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        <input type="submit" value="Criar Curso" class="btn btn-primary">
    </form>
</div>

@endsection