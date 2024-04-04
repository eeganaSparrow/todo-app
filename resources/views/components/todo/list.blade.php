@props([
    'todolists' => [],
    'expirationGroup' => [],
    'display' => '',
])
@if($display === 'uncomp')
<div>
    @foreach($expirationGroup as $expirationtime)
        <p class="text-xl mt-5 mb-2 ml-4">{{ $expirationtime }}</p>
        <div class="flex flex-wrap flex-between justify-items-center mx-5 last:mb-20">
            <div class="flex-item">
                @foreach($todolists as $todolist)
                    @if (!$todolist->completion_flag)
                        @if ($todolist->expiration_time === $expirationtime)
                            <div class="block p-4 mb-2 last:mb-2
                                    border rounded-xl bg-yellow-100
                                    flex justify-items-start justify-between">
                                <div class="pt-4 px-2">
                                    <form action="{{ route('todo.complete', ['listId' => $todolist->id]) }}" method='post'>
                                        @csrf
                                        <x-element.circle></x-element.circle>
                                    </form>
                                </div>
                                <span class="flex-wrap p-5 justify-items-start">{{ $todolist->content }}</span>
                                <x-todo.options :todolist="$todolist" :display="$display"></x-todo.options>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
</div>


@elseif ($display === 'comp')
<div>
    @foreach($expirationGroup as $expirationtime)
        <p class="text-xl mt-5 mb-2 ml-4">{{ $expirationtime }}</p>
        <div class="flex flex-wrap flex-between justify-items-center mx-5 last:mb-20">
            <div class="flex-item">
                
            </div>
            <div class="flex-item">
                @foreach($todolists as $todolist)
                    @if ($todolist->completion_flag)
                        @if ($todolist->expiration_time === $expirationtime)
                            <div class="block p-4 mb-2 last:mb-2
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
                                <p class="flex justify-end text-gray-400 -mt-3">
                                    {{ $todolist->completion_time }}完了
                                </p>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
</div>


@else
<div>
    @foreach($expirationGroup as $expirationtime)
        <div class="flex">
            <p class="text-xl mt-5 mb-2 mx-4">{{ $expirationtime }}</p>
            <form action="{{ route('todo.deletebydate', ['expirationtime' => $expirationtime]) }}"
                class="text-md mt-5 mb-2 mx-4" method="post">
                @method('DELETE')
                @csrf
                <button type="submit"
                    class="pt-0.5 pb-1 px-2 ml-2
                        text-sm font-medium text-gray-100
                        border rounded-md border-transparent shadow-sm bg-red-400
                        hover:bg-red-300
                        focus:outline-none focus:ring-2 focus:ring-offset-2
                        focus:ring-red-400">
                    まとめて削除
                </button>
            </form>            
        </div>
        <div class="flex flex-wrap flex-between justify-items-center mx-5 last:mb-20">
            <div class="flex-item">
                @foreach($todolists as $todolist)
                    @if (!$todolist->completion_flag)
                        @if ($todolist->expiration_time === $expirationtime)
                            <div class="block p-4 mb-2 last:mb-2
                                    border rounded-xl bg-yellow-100
                                    flex justify-items-start justify-between">
                                <div class="pt-4 px-2">
                                    <form action="{{ route('todo.complete', ['listId' => $todolist->id]) }}" method='post'>
                                        @csrf
                                        <x-element.circle></x-element.circle>
                                    </form>
                                </div>
                                <span class="flex-wrap p-5 justify-items-start">{{ $todolist->content }}</span>
                                <x-todo.options :todolist="$todolist" :display="$display"></x-todo.options>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
            <div class="flex-item">
                @foreach($todolists as $todolist)
                    @if ($todolist->completion_flag)
                        @if ($todolist->expiration_time === $expirationtime)
                            <div class="block p-4 mb-2 last:mb-2
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
                                <p class="flex justify-end text-gray-400 -mt-3">
                                    {{ $todolist->completion_time }}完了
                                </p>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@endif

@push('css')
<style>
    .flex-item {
        width: calc((100% - 32px) / 2);
        margin-left: 8px;
        margin-right: 8px;
        min-width: 340px;
    }
</style>
@endpush