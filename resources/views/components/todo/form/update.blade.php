<div>
    <form action="{{ route('todo.update.put', ['listId' => $todolist->id]) }}" method="post">
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
        <a href="{{ route('todo.complete.index') }}"
            class="flex items-center
                pt-2 pb-3 pl-4 pl-2 w-40
                text-center text-md font-medium text-gray-100
                border rounded-md border-transparent shadow-md bg-blue-400
                hover:bg-blue-300 hover:text-gray-50
                focus:outline-none focus:ring-2 focus:ring-offset-2
                focus:ring-blue-400">
            <span >完了済みを確認</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </a>
    </form>
</div>