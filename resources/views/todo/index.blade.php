<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoリスト</title>
</head>
<body>
    <h1>ToDoリスト</h1>
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
        @foreach($todolists as $todolist)
            <p>期限：{{ $todolist->expiration_time }}</p>
            <p>　　　{{ $todolist->content }}</p>
        @endforeach
    </div>
</body>
</html>