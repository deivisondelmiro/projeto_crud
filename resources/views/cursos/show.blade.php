@extends('layouts.main')

@section('title', $curso->title_curso)

@section('content')
    <div class="col-md-10 offset-md-1 container-page-curso">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/cursos/{{ $curso->image }}" alt="{{ $curso->title_curso}}" class="img-fluid">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $curso->title_curso }}</h1>
                <div class="curso-info">
                    <p>[{{$curso->duration}}]</p>
                    <p>{{$curso->level}}</p>
                </div>

                @if(auth()->check() && auth()->user()->is_admin)
                    <a href="/cursos/edit/{{ $curso->id }}" class="btn btn-info edit-btn">
                        <ion-icon name="create-outline"></ion-icon> Editar
                    </a>
                @elseif(auth()->check() && $hasUserJoined)
                    @php
                        $finalizado = false;
                        if(auth()->check()) {
                            $cursoUsuario = auth()->user()->cursosAsParticipant()->where('curso_id', $curso->id)->first();
                            $finalizado = $cursoUsuario && $cursoUsuario->pivot->completed;
                        }
                    @endphp

                    @if($finalizado)
                        <a href="/cursos/certificado/{{ $curso->id }}" class="btn btn-success">
                             Imprimir Certificado
                        </a>
                    @else
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cursoModal">
                            Acessar curso
                        </button>
                    @endif
                @else
                    <form action="/cursos/join/{{ $curso->id }}" method="POST" id="join-course-form">
                        @csrf
                        <a href="/cursos/join/{{ $curso->id }}" class="btn btn-primary" id="curso-submit" onclick="event.preventDefault(); this.closest('form').submit();">
                            Inscrever-se
                        </a>
                    </form>
                @endif

                <ul id="items-list">
                    @foreach($curso->items as $item)
                        <li>• {{ $item }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-12" id="description-container">
                <h3>Descrição:</h3>
                <p class="curso-description">{{ $curso->description}}</p>
            </div>

            <div class="modal fade" id="cursoModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $curso->title_curso }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            {!! $curso->conteudomodel !!}
                        </div>

                        {{-- LÓGICA DO BOTÃO FINALIZAR DENTRO DO MODAL --}}
                        <div class="modal-footer">
                            @if(isset($finalizado) && !$finalizado)
                                <form action="/cursos/finalizar/{{ $curso->id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Marcar como Concluído</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection