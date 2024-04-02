<?php
namespace App\Services;

use App\Models\Todolist;


class TodoService{
    public function getTodolistsAsc(int $userId){
        return Todolist::where('user_id', $userId)
            ->orderBy('expiration_time', 'desc')
            ->get();
    }

    public function getTodolistsDesc(){
        return Todolist::where('completion_flag', true)
            ->orderBy('expiration_time', 'desc')
            ->get();
    }

    public function getExpirationGroupAsc($userId){
        return Todolist::where('user_id', $userId)
            ->groupBy('expiration_time')
            ->orderBy('expiration_time', 'desc')
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