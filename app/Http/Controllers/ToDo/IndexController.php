<?php

namespace App\Http\Controllers\ToDo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todolist;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $todolists = Todolist::all();
        return view('todo.index')
            ->with('todolists', $todolists);
    }
}
