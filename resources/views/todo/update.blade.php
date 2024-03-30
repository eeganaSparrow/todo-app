<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoリスト</title>
</head>
<body>
    <h1>ToDoリスト　編集</h1>
    <div>
        <a href="{{ route('todo.index') }}">< 戻る</a>
        <p>入力フォーム</p>
        @if (session('feedback.success'))
            <p style="color: green">{{ session('feedback.success') }}</p>
        @endif
        <form action="{{ route('todo.update.put', ['listId' => $todolist->id]) }}" method="post">
            @method('PUT')
            @csrf
            <label for="todo-content">To Do</label>
            <span>100文字まで</span>
            <br>
            <input name="expiration_time" type="date" value="{{ $todolist->expiration_time }}">
            <br>
            <textarea name="todolist" id="todo-content" type="text"
             placeholder="ToDoを入力">{{ $todolist->content }}</textarea>
            <button type="submit">編集</button>
        </form>
    </div>
</body>
</html>