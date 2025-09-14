<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Game;
class panel extends Controller
{
    public function GetList()
    {

        $sort = 'titulo';
        $dir = 'asc';
        $items = Game::query()->orderBy($sort,$dir)->paginate(3);
        return view('panel',compact('items','sort','dir'));
    }

}
