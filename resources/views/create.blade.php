@extends('layouts.app')

@section('content')
    <h1 class="text-center">@if(isset($game))Editar @else Cadastrar @endif</h1>
    <hr>

    <div class="col-8 m-auto">
        
        <a href="{{url('games')}}">
            <button class="btn btn-danger">Voltar</button>
        </a>

            @if(isset($errors) && count($errors) > 0)
                <div class="text-center mt-4 mb-4 p-2 alert-danger">
                    @foreach($errors->all() as $erro)
                        {{$erro}}<br>
                    @endforeach
                </div>
            @endif

            @if(isset($game))
                <form class="mt-3" name="formEdit" id="formEdit" method="post" action="{{url("games/$game->id")}}">
                    @method('PUT')
            @else
                <form class="mt-3" name="formCad" id="formCad" method="post" action="{{url("games")}}">
            @endif        

            @csrf
            <input class="form-control mb-4" type="text" name="title" id="title" placeholder="Título:" value="{{$game->title ?? ''}}" required>
            <input class="form-control mb-4" type="text" name="genre" id="genre" placeholder="Gênero:" value="{{$game->genre ?? ''}}" required>
            <select class="form-control mb-4" name="id_user" id="id_user" required>
                <option value="{{$game->relUsers->id ?? ''}}">{{$game->relUsers->name ?? 'Desenvolvedora'}}</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <input class="form-control mb-4" type="text" name="price" id="price" placeholder="Preço:" value="{{$game->price ?? ''}}" required>
            <input class="btn btn-primary mb-4" type="submit" value="@if(isset($game))Editar @else Cadastrar @endif">
        </form>
    </div>
@endsection
