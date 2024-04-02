<x-layout title="やることリスト">
    <x-layout.single>
        <h2 class="text-center text-green-400 text-4xl font-bold mt-8 mb-8">
            完了済み
        </h2>
        <x-todo.completelist :todolists="$todolists" :expirationGroup="$expirationGroup"></x-todo.completelist>
    </x-layout.single>
</x-layout> 