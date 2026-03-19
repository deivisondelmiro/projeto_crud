@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

<div id="curso-create-container" class="container-create col-md-6 offset-md-3">
    <h1>Crie o seu curso</h1>
    <form action="/cursos" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title_curso">Curso:</label>
            <input type="text" class="form-control" id="title_curso" name="title_curso" placeholder="Curso de JavaScript">
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea class="form-control" id="description" name="description" placeholder="O que será abordado no curso?" minlength="100"></textarea>
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
            <label for="title">Características do Curso</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" id="item-ao-vivo" value="Ao vivo">
                <label for="item-ao-vivo">Ao vivo</label>  
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" id="item-gravado" value="Gravado">
                <label for="item-gravado">Gravado</label>
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" id="item-certificado" value="Certificado">
                <label for="item-certificado">Certificado</label>
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" id="item-vitalicio" value="Acesso vitalício">
                <label for="item-vitalicio">Acesso vitalício</label>
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" id="item-requisitos" value="Sem pré-requisitos">
                <label for="item-requisitos">Sem pré-requisitos</label>
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" id="item-conhecimento" value="Conhecimento básico">
                <label for="item-conhecimento">Conhecimento básico</label>
            </div>
        </div>
        <div class="form-group">
            <label for="image">Imagem do curso:</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="conteudomodel">Conteúdo do Curso:</label>
            <textarea name="conteudomodel" id="conteudomodel" class="form-control" rows="20"></textarea>
        </div>
        <input type="submit" value="Criar Curso" class="btn btn-primary">
    </form>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#conteudomodel'), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable', 'undo', 'redo' ]
        })
        .catch(error => {
            console.error(error);
        });
</script>

@endsection