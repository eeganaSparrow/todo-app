<?php

namespace App\Http\Controllers\ToDo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todolist;

class CompleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $listId = (int) $request->route('listId');
        $todolist = Todolist::where('id', $listId)->firstOrFail();
        $todolist->completion_flag = true;
        $todolist->completion_time = now();
        $todolist->save();
        return redirect()
            ->route('todo.index');
    }
}
