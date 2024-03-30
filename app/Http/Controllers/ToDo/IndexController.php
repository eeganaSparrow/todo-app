<?php

namespace App\Http\Controllers\ToDo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todolist;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $todolists = Todolist::where('completion_flag', false)
                    ->orderBy('expiration_time', 'asc')
                    ->get();
        $expirationGroup = Todolist::groupBy('expiration_time')
                        ->orderBy('expiration_time', 'asc')
                        ->pluck('expiration_time');
        return view('todo.index')
            ->with('todolists', $todolists)
            ->with('expirationGroup', $expirationGroup);
    }
}
