<?php

namespace App\Http\Controllers\ToDo\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todolist;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $listId = (int) $request->route('listId');
        $todolist = Todolist::where('id', $listId)->firstOrFail();
        return view('todo.update')->with('todolist', $todolist);
    }
}
