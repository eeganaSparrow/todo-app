<?php

namespace App\Http\Controllers\ToDo\Complete;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todolist;

class UnCompleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $listId = (int) $request->route('listId');
        $todolist = Todolist::where('id', $listId)->firstOrFail();
        $todolist->completion_flag = false;
        $todolist->completion_time = null;
        $todolist->save();
        return redirect()
            ->route('todo.complete.index');
    }
}
