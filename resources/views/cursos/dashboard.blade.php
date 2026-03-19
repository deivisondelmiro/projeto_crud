@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
@if(auth()->user()->is_admin)
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Cursos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-cursos-container">
        @if(count($cursos) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Curso</th>
                    <th scope="col">Edição</th>
                    <th scope="col">Exclusão</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cursos as $curso)
                    <tr>
                        <td>
                            <a href="/cursos/{{$curso->id}}">
                                <img src="/img/cursos/{{$curso->image}}" alt="{{$curso->title_curso}}" width="50">
                                {{$curso->title_curso}}
                            </a>
                        </td>
                        <td>
                            <a href="/cursos/edit/{{ $curso->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a>
                        </td>
                        <td>
                            <form id="form-delete" action="/cursos/{{ $curso->id }}" method="POST" class="btn btn-info edit-btn">
                                <ion-icon name="trash-outline"></ion-icon>
                                @csrf
                                @method('DELETE')
                                <button class="btn-btn-danger delete-btn">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>Você ainda não tem cursos.</p>
        @endif
@endif
@if(!auth()->user()->is_admin)
</div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Cursos que estou inscrito.</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        @if(count($cursosAsParticipant) > 0)
        <table class="table" id=table-cursos-participante>
            <thead>
                <tr>
                    <th scope="col">Curso</th>
                    <th scope="col">Duração</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cursosAsParticipant as $curso)
                    <tr>
                        <td>
                            <a href="/cursos/{{$curso->id}}">
                                <img src="/img/cursos/{{$curso->image}}" alt="{{$curso->title_curso}}" width="50">
                                {{$curso->title_curso}}
                            </a>
                        </td>
                        <td>{{$curso->duration}}</td>
                        <td>
                            <form action="/cursos/leave/{{ $curso->id }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> <span>Cancelar matrícula</span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endif
@endsection