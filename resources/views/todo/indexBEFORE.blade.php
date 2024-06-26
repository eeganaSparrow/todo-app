<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoリスト</title>
</head>
<body>
    <h1>ToDoリスト</h1>
    <a href="{{ route('todo.complete.index') }}">完了済みリストを表示</a>
    <div>
        <p>入力フォーム</p>
        <form action="{{ route('todo.create') }}" method="post">
            @csrf
            <label for="todo-content">To Do</label>
            <span>100文字まで</span>
            <br>
            <input name="expiration_time" type="date" value="<?php echo date('Y-m-d'); ?>">
            <br>
            <textarea name="todolist" id="todo-content" type="text" placeholder="ToDoを入力"></textarea>
            <button type="submit">追加</button>
        </form>
    </div>
    <div>
        @foreach($expirationGroup as $expirationtime)
            <p>期限：{{ $expirationtime }}</p>
            @foreach($todolists as $todolist)
                @if ($todolist->expiration_time === $expirationtime)
                    <span>　　　{{ $todolist->content }}　　　　</span>
                    <form action="{{ route('todo.complete', ['listId' => $todolist->id]) }}" method='post'>
                        @csrf
                        <button type="submit">完了</button>
                    </form>
                    <a href="{{ route('todo.update.index', ['listId' => $todolist->id]) }}">編集</a>
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