<?php

namespace App\Http\Controllers\ToDo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todolist;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $listId = (int) $request->route('listId');
        $todolist = Todolist::where('id', $listId)->firstOrFail();
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