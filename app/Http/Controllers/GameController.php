<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GameController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Game::class, 'game');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $sort = 'titulo';
        $dir = 'asc';
        $items = Game::query()->orderBy($sort,$dir)->paginate(3);
        return view('panel',compact('items','sort','dir'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.Game.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
