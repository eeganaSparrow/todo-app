<div class="flex justify-center">
    <div class="max-w-screen-sm w-full">
        @auth
            <details class="list-option relative text-gray-500">
                <summary class="flex justify-end p-4 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mt-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <span><?php $user = Auth::user(); ?>{{ $user->name }}</span>
                </summary>

                <div class="bg-gray-100 rounded shadow-md absolute right-0 w-auto pb-2 text-center cursor-pointer">
                    <div>
                        <form action="{{ route('logout')}}" method="post">
                        @csrf
                            <button class="rounded text-sm hover:bg-yellow-100 w-full p-2"
                                    onclick="event.preventDefault(); this.closest('form').submit();">ログアウト</button>
                        </form>
                    </div>
                    <div class="mt-1">
                        <form action="{{ route('todo.user.delete') }}" method="post"
                            onclick="return confirm('削除してもよろしいですか？')">
                            @method('DELETE')
                            @csrf
                            <button class="rounded text-sm w-full p-2 pb-3 hover:bg-red-100"
                                type="submit">アカウント削除</button>
                        </form>
                    </div>
                </div>
            </details>
        @endauth
        {{ $slot }}
    </div>
</div>
@once
@push('css')
    <style>
        .list-option > summary {
            list-style: none;
            cursor: pointer;
        }
        .list-option[open] > summary::before {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 0;
            display: block;
            content: " ";
            background: transparent;
        }
    </style>
@endpush
@endonce