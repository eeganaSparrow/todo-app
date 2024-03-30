<?php
namespace App\Services;

use App\Models\Todolist;


class TodoService{
    public function getTodolistsAsc(){
        return Todolist::where('completion_flag', false)
            ->orderBy('expiration_time', 'asc')
            ->get();
    }

    public function getTodolistsDesc(){
        return Todolist::where('completion_flag', true)
            ->orderBy('expiration_time', 'desc')
            ->get();
    }

    public function getExpirationGroupAsc(){
        return Todolist::where('completion_flag', false)
            ->groupBy('expiration_time')
            ->orderBy('expiration_time', 'asc')
            ->pluck('expiration_time');
    }

    public function getExpirationGroupDesc(){
        return Todolist::where('completion_flag', true)
            ->groupBy('expiration_time')
            ->orderBy('expiration_time', 'desc')
            ->pluck('expiration_time');
    }

    public function getTodolistByID(int $listId){
        return Todolist::where('id', $listId)->firstOrFail();
    }
}