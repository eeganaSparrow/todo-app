<?php

namespace App\Http\Controllers\ToDo\Display;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TodoService;

class ComplistController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TodoService $todoService)
    {
        if(is_null($request->user())){
            return view('todo.index');
        } else {
            $userId = $request->user()->id;
            $todolists = $todoService->getTodolistsAsc($userId);
            $expirationGroup = $todoService->getExpirationGroupComp($userId);
            $display = 'comp';
            return view('todo.index')
                ->with('todolists', $todolists)
                ->with('expirationGroup', $expirationGroup)
                ->with('display', $display);
        }
    }
}
