@props([
    'todolist' => [],
    'display' => '',
])
<div>
    <form action="{{ route('todo.update.put', ['listId' => $todolist->id, 'display' => $display]) }}" method="post">
        @method('PUT')
        @csrf
        <input
            name="expiration_time"
            type="date"
            value="{{ $todolist->expiration_time }}"
            class="rounded-md border-gray-300
                sm:text-md
                focus:ring-red-400 focus:border-red-400">
        <br>
        <textarea
            name="todolist"
            id="todo-content"
            type="text"
            class="w-full mt-3 mb-2 p-2 block
                rounded-md border-gray-300
                sm:text-md
                focus:ring-red-400 focus:border-red-400">{{ $todolist->content }}</textarea>
        <div class="flex flex-wrap justify-end">
            <x-element.button>
                <a href="{{ route('todo.index') }}" class="">
                    戻る
                </a>
            </x-element.button>
            <x-element.update-button>
                編集
            </x-element.update-button>
        </div>
    </form>
</div>