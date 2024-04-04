<x-layout title="やることリスト">
    <x-layout.single>
        <h2 class="text-center text-green-400 text-4xl font-bold mt-8 mb-8">
            やること
        </h2>
        @if(!isset($todolist))
        <x-todo.form.post></x-todo.form.post>
        @else
        <x-todo.form.update :todolist="$todolist" :display="$display"></x-todo.form.update>
        @endif
        
        @if(isset($display))
        <x-todo.display :display="$display"></x-todo.display>
        @endif
    </x-layout.single>
    @if(isset($todolists))
        <x-todo.list :todolists="$todolists" :expirationGroup="$expirationGroup" :display="$display"></x-todo.list>
    @endif
</x-layout> 