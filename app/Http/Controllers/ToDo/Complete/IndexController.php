<?php

namespace App\Http\Controllers\ToDo\Complete;

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
        $todolists = Todolist::where('completion_flag', true)
                    ->orderBy('expiration_time', 'desc')
                    ->get();
        $expirationGroup = Todolist::where('completion_flag', true)
                        ->groupBy('expiration_time')
                        ->orderBy('expiration_time', 'desc')
                        ->pluck('expiration_time');
        return view('todo.complete')
            ->with('todolists', $todolists)
            ->with('expirationGroup', $expirationGroup);
    }
}
