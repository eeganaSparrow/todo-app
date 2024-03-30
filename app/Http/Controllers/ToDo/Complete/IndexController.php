<?php

namespace App\Http\Controllers\ToDo\Complete;

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
        $todolists = $todoService->getTodolistsDesc();
        $expirationGroup = $todoService->getExpirationGroupDesc();
        return view('todo.complete')
            ->with('todolists', $todolists)
            ->with('expirationGroup', $expirationGroup);
    }
}
