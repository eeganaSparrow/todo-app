@props([
    'todolists' => [],
    'expirationGroup' => []
])
<div>
    @foreach($expirationGroup as $expirationtime)
        <p class="text-lg mt-10">期限：{{ $expirationtime }}</p>
            @foreach($todolists as $todolist)
                @if ($todolist->expiration_time === $expirationtime)
                    <div class="block p-4 mb-2 ml-5 last:mb-20
                            border rounded-xl bg-yellow-100
                            flex justify-items-start justify-between">
                        <div class="pt-4 px-2">
                            <form action="{{ route('todo.complete', ['listId' => $todolist->id]) }}" method='post'>
                                @csrf
                                <x-element.circle></x-element.circle>
                            </form>
                        </div>
                        <span class="flex-wrap p-5 justify-items-start">{{ $todolist->content }}</span>
                        <x-todo.options :todolist="$todolist"></x-todo.options>
                    </div>
                @endif
            @endforeach
    @endforeach
</div>