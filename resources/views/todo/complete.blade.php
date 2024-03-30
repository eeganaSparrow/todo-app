<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>完了済みリスト</title>
</head>
<body>
    <h1>完了済みリスト</h1>
    <a href="{{ route('todo.index') }}">ToDoリストに戻る</a>
    <div>
        @foreach($expirationGroup as $expirationtime)
            <p>期限：{{ $expirationtime }}</p>
            @foreach($todolists as $todolist)
                @if ($todolist->expiration_time === $expirationtime)
                    <p>　　　{{ $todolist->content }}　　　　</p>
                    <p>　　　完了日：{{ $todolist->completion_time }}　　　　</p>
                    <form action="{{ route('todo.uncomplete', ['listId' => $todolist->id]) }}" method='post'>
                        @csrf
                        <button type="submit">未完了に戻す</button>
                    </form>
                    <form action="{{ route('todo.delete', ['listId' => $todolist->id]) }}" method='post'>
                        @method('delete')
                        @csrf
                        <button type="submit">削除</button>
                    </form>
                @endif
            @endforeach
        @endforeach
    </div>
</body>
</html>