<?php

namespace App\Http\Controllers\ToDo;

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
        $todolists = $todoService->getTodolistsAsc();
        $expirationGroup = $todoService->getExpirationGroupAsc();
        return view('todo.index')
            ->with('todolists', $todolists)
            ->with('expirationGroup', $expirationGroup);
    }
}
