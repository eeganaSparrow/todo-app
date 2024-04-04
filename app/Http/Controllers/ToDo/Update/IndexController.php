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
        $userId = $request->user()->id;
        $todolists = $todoService->getTodolistsAsc($userId);
        $expirationGroup = $todoService->getExpirationGroupAsc($userId);
        $display = $request->input('display');
        
            return view('todo.index')
                ->with('todolists', $todolists)
                ->with('expirationGroup', $expirationGroup)
                ->with('todolist', $todolist)
                ->with('display', $display);
        
    }
}
