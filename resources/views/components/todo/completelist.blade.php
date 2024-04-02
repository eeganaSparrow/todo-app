@props([
    'todolists' => [],
    'expirationGroup' => []
])
<a href="{{ route('todo.index') }}"
    class="flex items-center
        pt-2 pb-3 pl-4 pl-2 w-52
        text-center text-md font-medium text-gray-100
        border rounded-md border-transparent shadow-md bg-blue-400
        hover:bg-blue-300 hover:text-gray-50
        focus:outline-none focus:ring-2 focus:ring-offset-2
        focus:ring-blue-400">
    <span >やることリストに戻る</span>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
    </svg>
</a>
<div>
    @foreach($expirationGroup as $expirationtime)
        <p class="text-lg text-gray-400 mt-10">期限：{{ $expirationtime }}</p>
            @foreach($todolists as $todolist)
                @if ($todolist->expiration_time === $expirationtime)
                    <div class="block p-4 mb-2 ml-5 last:mb-20
                                border rounded-xl bg-yellow-100">
                        <div class="flex justify-items-start justify-between">
                            <div class="pt-4 px-2">
                                <form action="{{ route('todo.uncomplete', ['listId' => $todolist->id]) }}" method='post'>
                                    @csrf
                                    <x-element.uncompletecircle></x-element.uncompletecircle>
                                </form>
                            </div>
                            <span class="flex-wrap p-5 justify-items-start text-gray-400">
                                {{ $todolist->content }}
                            </span>
                            <x-todo.deleteoptions :todolist="$todolist"></x-todo.deleteoptions>
                        </div>
                        <p class="flex justify-end text-gray-400">
                            {{ $todolist->completion_time }}完了
                        </p>
                    </div>
                @endif
            @endforeach
    @endforeach
</div>