<?php

namespace App\Http\Controllers\ToDo\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TodoService;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TodoService $todoService)
    {
        $userId = (int) $request->user()->id;
        $todolist = $todoService->getToDolistByUserId($userId);
        $user = $todoService->getUserByUserId($userId);
        if($todolist){
            $todolist->each->delete();
        }
        if($user){
            $user->each->delete();
        }
        return view('todo.user.delete');
        
    }
}
