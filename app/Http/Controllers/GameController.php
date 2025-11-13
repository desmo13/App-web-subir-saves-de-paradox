<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Models\Game;
use App\Models\GameName;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GameController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Game::class, 'games');
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->get('sort','titulo');
        $dir = $request->get('dir','asc');
        $search = $request->get('search');
        $items = Game::query()->orderBy($sort,$dir);
        if($search){
            $items->where('title','like','%'.$search.'%');
        }
        $items = $items->paginate(6);

        return view('panel',compact('items','sort','dir','search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gameNames = GameName::query()->orderBy('name','asc')->get();
        return view('page.Game.Create',compact('gameNames'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request)
    {
    $data = $request->validated();
    $data['user_id'] = Auth::id();

    $uploadFile = $request->file('file');

    if($uploadFile){
        $path =$uploadFile->store('uploads');
        $data['file_name'] = $uploadFile->getClientOriginalName();
        $data['path'] = $path;
    }
    Game::create($data);

    return redirect()->route('games.index')->with('success','El juego ha sido creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
