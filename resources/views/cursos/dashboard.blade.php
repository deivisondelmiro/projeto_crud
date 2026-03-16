@extends('layouts.main')

@section('title', 'Dashboard')

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
                    <td><a href="/cursos/{{$cursos->id}}">{{$curso->title}}</a></td>
                    <td>0</td>
                    <td>
                        <a href="/cursos/edit/{{ $curso->id }}" class="btn btn-info edit-btn">Editar</a>
                        <form action="/cursos/{{ $curso->id }}" class="btn btn-info edit-btn">
                            @csrf
                            @method('DELETE')
                            <button class="btn-btn-danger delete-btn">Deletar</button>
                        </form>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Você ainda não tem cursos.</p>
    @endif
</div>

@endsection