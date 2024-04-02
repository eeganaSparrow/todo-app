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
    </form>
</div>