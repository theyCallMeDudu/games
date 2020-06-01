@extends('layouts.app')

@section('content')
    <h1 class="text-center">Visualizar</h1>
    <hr>

    @php
        $user = $game->find($game->id)->relUsers;
    @endphp

    <div class="col-8 m-auto">
        Título: {{$game->title}}<br>
        Gênero: {{$game->genre}}<br>
        Desenvolvedora: {{$user->name}}<br>
        Preço: R$ {{$game->price}}
    </div>
@endsection
