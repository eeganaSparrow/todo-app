<?php

namespace App\Http\Controllers\ToDo\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TodoService;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TodoService $todoService)
    {
        $listId = (int) $request->route('listId');
        $todolist = $todoService->getTodolistByID($listId);
        return view('todo.update')->with('todolist', $todolist);
    }
}
