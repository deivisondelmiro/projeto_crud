@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
@if(auth()->user()->is_admin)
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Cursos Cadastrados</h1>
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
                        <td class="ps-3 pt-2 pb-2">
                            <a href="/cursos/{{$curso->id}}">
                                <img src="/img/cursos/{{$curso->image}}" alt="{{$curso->title_curso}}" width="50">
                                {{$curso->title_curso}}
                            </a>
                        </td>
                        <td class="ps-3 pt-2 pb-2">
                            <a href="/cursos/edit/{{ $curso->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a>
                        </td>
                        <td class="ps-3 pt-2 pb-2">
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
            <a href="/cursos/create" class="btn btn-primary">Crie um novo curso</a>
        @endif
@endif
@if(!auth()->user()->is_admin)
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus Cursos</h1>
        @if(count($cursosAsParticipant) == 0)
        <h1>Você ainda não está inscrito em nenhum curso.</h1>
        <a href="{{ route('cursos') }}" class="btn btn-primary">Ver Cursos Disponíveis</a>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        @elseif(count($cursosAsParticipant) > 0)
        <table class="table table-responsive" id=table-cursos-participante>
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
                        <td class="ps-3 pt-2 pb-2">
                            <a href="/cursos/{{$curso->id}}">
                                <img src="/img/cursos/{{$curso->image}}" alt="{{$curso->title_curso}}" width="50">
                                {{$curso->title_curso}}
                            </a>
                        </td>
                        <td class="ps-3 pt-2 pb-2">{{$curso->duration}}</td>
                        <td class="ps-3 pt-2 pb-2">
                            @if($curso->isFinalizado())
                                <a href="{{ route('certificado.pdf', $curso->id) }}" class="btn btn-success" target="_blank">
                                    <ion-icon name="document-attach-outline"></ion-icon> <span>Imprimir Certificado</span>
                                </a>
                            @else
                            <form action="/cursos/leave/{{ $curso->id }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> <span>Cancelar Matrícula</span></button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endif
@endsection