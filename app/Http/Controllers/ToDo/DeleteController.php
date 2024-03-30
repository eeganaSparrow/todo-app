<?php

namespace App\Http\Controllers\ToDo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TodoService;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TodoService $todoService)
    {
        $listId = (int) $request->route('listId');
        $todolist = $todoService->getTodolistByID($listId);
        $todolist->delete();
        if ($todolist->completion_flag){
            return redirect()
                ->route('todo.complete.index');
        } else {
            return redirect()
                ->route('todo.index');
        }
    }
}
