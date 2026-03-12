@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

<div id="curso-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu curso</h1>
    <form action="/cursos" method="POST">
        <div class="form-group">
            <label for="title">Curso:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Curso de JavaScript">
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <input type="textarea" class="form-control" id="description" name="description">
        </div>
        <div class="form-group">
            <label for="duration">Duração:</label>
            <input type="text" name="duration" id="duration" class="form-control" placeholder="15h">
        </div>
        <div class="form-group">
            <label for="level">Nível:</label>
            <select name="private" id="private" class="form-control">
                <option value="basico">Básico</option>
                <option value="intermediario">Intermediário</option>
                <option value="avancado">Avançado</option>
            </select>
        </div>
        <input type="submit" value="Criar Curso" class="btn btn-primary">
    </form>
</div>

@endsection