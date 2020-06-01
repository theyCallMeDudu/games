@extends('layouts.app')

@section('content')
    <h1 class="text-center">CRUD GAMES</h1>
    <hr>

    <div class="text-center mt-3 mb-4">
        <a href="{{url("games/create")}}">
            <button class="btn btn-success">
                <i class="fas fa-plus"></i> Cadastrar
            </button>
        </a>
    </div>

    <div class="col-8 m-auto">
        <table class="table text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Título</th>
                    <th scope="col">Desenvolvedora</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($game as $games)  
                @php
                    $user = $games->find($games->id)->relUsers;
                @endphp
                <tr>
                    <th scope="row">{{$games->id}}</th>
                    <td>{{$games->title}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$games->price}}</td>
                    <td>
                        <a href="{{url("games/$games->id")}}">
                            <button class="btn btn-dark"><i class="fas fa-eye"></i> Visualizar</button>
                        </a>
                    
                        <a href="{{url("games/$games->id/edit")}}">
                            <button class="btn btn-primary"><i class="fas fa-edit"></i> Editar</button>
                        </a>
                        
                        <!-- <form action="{{url("games/destroy/$games->id")}}">
                            @method("DELETE")
                            @csrf
                            <a href="#">
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </a>
                        </form> -->

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete">
                            <i class="fas fa-trash"></i> Excluir                        
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Excluir jogo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Deseja realmente excluir este item?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                
                                <form action="{{url("games/destroy/$games->id")}}">
                                    @method("DELETE")
                                    @csrf
                                        <a href="#">
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </a>
                                </form>
                                
                            </div>
                            </div>
                        </div>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
