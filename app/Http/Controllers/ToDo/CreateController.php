<?php

namespace App\Http\Controllers\ToDo;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToDo\CreateRequest;
use App\Models\Todolist;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request)
    {
        $todolist = new Todolist;
        $todolist->user_id = $request->userId();
        $todolist->content = $request->todo();
        $todolist->expiration_time = $request->expirationTime();
        $todolist->save();
        return redirect()->route('todo.index');
    }
}
