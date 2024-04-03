@props([
    'display' => '',
])
<div class="">
    <div class="flex justify-evenly p-4">
        @if($display === 'comp')
            <x-element.button-display :href="route('uncomplist.index')">未完了のみ表示</x-element.button-a>
            <x-element.button-display :href="route('todo.index')">すべて表示</x-element.button-a>
        @elseif($display === 'uncomp')
            <x-element.button-display :href="route('todo.index')">すべて表示</x-element.button-a>
            <x-element.button-display :href="route('complist.index')">完了のみ表示</x-element.button-a>
        @else
            <x-element.button-display :href="route('uncomplist.index')">未完了のみ表示</x-element.button-a>
            <x-element.button-display :href="route('complist.index')">完了のみ表示</x-element.button-a>
        @endif
    </div>
</div>