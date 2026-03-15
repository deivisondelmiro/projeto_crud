@extends('layouts.main')

@section('title', 'Dashboard')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Cursos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-cursos-container">
    @if(count($cursos) > 0)
    @else
        <p>Você ainda não tem cursos.</p>
    @endif
</div>

@endsection