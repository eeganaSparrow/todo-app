<?php

namespace App\Http\Controllers\ToDo\Complete;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todolist;
use App\Services\TodoService;

class UnCompleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TodoService $todoService)
    {
        $listId = (int) $request->route('listId');
        $todolist = $todoService->getTodolistByID($listId);
        $todolist->completion_flag = false;
        $todolist->completion_time = null;
        $todolist->save();
        return redirect()
            ->route('todo.index');
    }
}
