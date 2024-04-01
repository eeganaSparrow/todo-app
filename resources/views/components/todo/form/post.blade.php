<div>
    <form action="{{ route('todo.create') }}" method="post">
        @csrf
        <input
            name="expiration_time"
            type="date"
            value="<?php echo date('Y-m-d'); ?>"
            class="rounded-md border-gray-300
                sm:text-md
                focus:ring-green-400 focus:border-green-400">
        <br>
        <textarea
            name="todolist"
            id="todo-content"
            type="text"
            placeholder="やることを追加"
            class="w-full mt-3 mb-2 p-2 block
                rounded-md border-gray-300
                sm:text-md
                focus:ring-green-400 focus:border-green-400"></textarea>
        <div class="flex flex-wrap justify-end">
            <x-element.button>
                追加
            </x-element.button>
        </div>
        <a href="{{ route('todo.complete.index') }}"
            class="flex items-center
                pt-2 pb-3 pl-4 pl-2 w-40
                text-center text-md font-medium text-gray-800
                border rounded-md border-transparent shadow-sm bg-blue-300
                hover:bg-blue-500
                focus:outline-none focus:ring-2 focus:ring-offset-2
                focus:ring-blue-400">
            <span >完了済みを確認</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </a>
    </form>
</div>