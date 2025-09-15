<?php

namespace App\Http\Controllers;

use App\Models\GameName;
use App\Http\Requests\StoreGameNameRequest;
use App\Http\Requests\UpdateGameNameRequest;

class GameNameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameNameRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GameName $gameName)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GameName $gameName)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameNameRequest $request, GameName $gameName)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GameName $gameName)
    {
        //
    }
}
