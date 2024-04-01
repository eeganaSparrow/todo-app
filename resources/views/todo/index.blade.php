<x-layout title="やることリスト">
    <x-layout.single>
        <h2 class="text-center text-green-400 text-4xl font-bold mt-8 mb-8">
            やることリスト
        </h2>
        <x-todo.form.post></x-todo.form.post>
        <x-todo.list :todolists="$todolists" :expirationGroup="$expirationGroup"></x-todo.list>
    </x-layout.single>
</x-layout> 