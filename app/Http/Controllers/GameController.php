<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Models\ModelGame;
use App\User;

class GameController extends Controller
{
    private $objUser;
    private $objGame;

    public function __construct(){
        $this->objUser = new User();
        $this->objGame = new ModelGame();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $game = $this->objGame->all()->sortBy('title');
        return view('index', compact('game'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->objUser->all();
        return view('create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameRequest $request)
    {
        $cad = $request->all();
        $user = auth()->user();

        $game = $user->store()->create($cad);

        flash('Jogo criado com sucesso')->success();

        if($cad){
            return redirect('games');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = $this->objGame->find($id);
        return view('show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game = $this->objGame->find($id);
        $users = $this->objUser->all();
        return view('create', compact('game', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GameRequest $request, $id)
    {
        $this->objGame->where(['id'=>$id])->update([
            'title'=>$request->title,
            'genre'=>$request->genre,
            'id_user'=>$request->id_user,
            'price'=>$request->price
        ]);
        return redirect('games');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->objGame->find($id);
        $delete->delete();

        if($delete){
            return redirect('games');
        }
    }
}
