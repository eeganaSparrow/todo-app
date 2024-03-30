<?php

namespace App\Http\Controllers\ToDo\Update;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToDo\UpdateRequest;
use App\Models\Todolist;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request)
    {
        $todolist = Todolist::where('id', $request->id())->firstOrFail();
        $todolist->content = $request->todo();
        $todolist->expiration_time = $request->expirationTime();
        $todolist->save();
        return redirect()
            ->route('todo.update.index', ['listId' => $todolist->id])
            ->with('feedback.success', "リストを編集しました");
    }
}
