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
        if(is_null($request->user())){
            return view('todo.index');
        } else {
            $userId = $request->user()->id;
            $todolists = $todoService->getTodolistsAsc($userId);
            $expirationGroup = $todoService->getExpirationGroupAsc($userId);
            return view('todo.index')
                ->with('todolists', $todolists)
                ->with('expirationGroup', $expirationGroup);
        }
    }
}
