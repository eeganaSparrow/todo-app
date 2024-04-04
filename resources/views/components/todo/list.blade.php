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