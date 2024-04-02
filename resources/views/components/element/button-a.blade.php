@props([
    'href' => '',
    'theme' => 'primary',
])
@php
    if(!function_exists('getThemeClassForButtonA')){
        function getThemeClassForButtonA($theme){
            return match ($theme){
                'primary' => 'text-white bg-green-500
                            hover:bg-green-400
                            focus:ring-green-500',
                'secondary' => 'text-white bg-red-500
                            hover:bg-red-400
                            focus:ring-red-500',
                'default' => '',
            };
        }
    }
@endphp

<a href="{{ $href }}"
    class="inline-flex justify-center
        py-2 px-4
        border border-transparent shadow-sm rounded-md
        text-lg font-medium
        focus:outline-none focus:ring-2 focus:ring-offset-2
        {{ getThemeClassForButtonA($theme) }}
        ">
{{ $slot }}
</a>