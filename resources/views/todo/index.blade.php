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
        @foreach($todolists as $todolist)
            <p>期限：{{ $todolist->expiration_time }}</p>
            <p>　　　{{ $todolist->content }}</p>
        @endforeach
    </div>
</body>
</html>