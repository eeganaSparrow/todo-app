<?php
namespace App\Services;

use App\Models\Todolist;
use App\Models\User;


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

    public function getExpirationGroupComp($userId){
        return Todolist::where('user_id', $userId)
            ->where('completion_flag', true)
            ->groupBy('expiration_time')
            ->orderBy('expiration_time', 'desc')
            ->pluck('expiration_time');
    }

    public function getExpirationGroupUnComp($userId){
        return Todolist::where('user_id', $userId)
            ->where('completion_flag', false)
            ->groupBy('expiration_time')
            ->orderBy('expiration_time', 'desc')
            ->pluck('expiration_time');
    }

    public function getTodolistByID(int $listId){
        return Todolist::where('id', $listId)->firstOrFail();
    }

    public function getToDolistByUserId(int $userId){
        return Todolist::where('user_id', $userId)->get();
    }

    public function getUserByUserId(int $userId){
        return User::where('id', $userId)->get();
    }

    public function getTodolistByDate(int $userId, $expirationtime){
        return Todolist::where('user_id', $userId)
            ->where('expiration_time', $expirationtime)
            ->get();
    }
}