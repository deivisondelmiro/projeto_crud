@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Cursos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-cursos-container">
    @if(count($cursos) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Curso</th>
                <th scope="col">Duração</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
                <tr>
                    <td scropt="row">{{$loop->index + 1}}</td>
                    <td><a href="/cursos/{{$curso->id}}">{{$curso->title}}</a></td>
                    <td>0</td>
                    <td>
                        <a href="/cursos/edit/{{ $curso->id }}" class="btn btn-info edit-btn">Editar</a>
                        <form action="/cursos/{{ $curso->id }}" method="POST" class="btn btn-info edit-btn">
                            @csrf
                            @method('DELETE')
                            <button class="btn-btn-danger delete-btn">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Você ainda não tem cursos.</p>
    @endif
</div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Cursos que estou inscrito.</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        @if(count($cursosAsParticipant) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Duração</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cursosAsParticipant as $curso)
                    <tr>
                        <td scropt="row">{{$loop->index + 1}}</td>
                        <td><a href="/cursos/{{$curso->id}}">{{$curso->title}}</a></td>
                        <td>0</td>
                        <td>
                            <form action="/cursos/leave/{{ $curso->id }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger delete-btn">Cancelar matrícula</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endsection