<?php

namespace App\Http\Requests\ToDo;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'todolist' =>'required|max:100',
            'expiration_time' =>'required|date'
        ];
    }

    public function todo(): string{
        return $this->input('todolist');
    }

    public function expirationTime(){
        return $this->input('expiration_time');
    }
    public function id(): int{
        return (int) $this->route('listId');
    }
}
