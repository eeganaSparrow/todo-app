<?php

namespace App\Http\Controllers\ToDo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TodoService;

class DeleteByDateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TodoService $todoService)
    {
        $userId = $request->user()->id;
        $expirationtime = $request->input('expirationtime');
        $todolists = $todoService->getTodolistByDate($userId, $expirationtime);
        $todolists->each->delete();
        return redirect()
            ->route('todo.index');
    }
}
