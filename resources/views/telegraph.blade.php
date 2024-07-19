<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>MyDataBase</title>
</head>
<body>
<h2>MyDataBase</h2>

{{--Верстака представления БД--}}
<table border=1px class="">
    <thead>
    <tr>
        <th>ID</th>
        <th>Автор</th>
        <th>Заголовок</th>
        <th>Содержимое</th>
        <th>Дата создания</th>
        <th>Изменить/Удалить пользователя</th>
    </tr>
    </thead>
    {{--реализуем вывод данных из БД с помощью "foreach и <td>" --}}
    <tbody>
    @foreach($storages as $storage)
        <tr>
            <form method="post" action="{{route('storage.updatePublication', $storage->id)}}">
                @csrf
                @method('put')
                <td> {{$storage->id}} </td>
                <td><input type='text' name='author' value='{{$storage->author}}'></td>
                <td><input type='text' name='title' value='{{$storage->title}}'></td>
                <td><input type='text' name='text' value='{{$storage->text}}'></td>
                <td> {{$storage->created_at}} </td>
                <td>
                    <input type='hidden' name='user_id' value='{{$storage->id}}'>
                    <input type="submit" name="update" value="Изменить">
            </form>
            <form method="post" action="{{route('storage.deletePublication', $storage->id)}}">
                @csrf
                @method('delete')
                <input type='hidden' name='user_id' value='{{$storage->id}}'>
                <input type="submit" name="delete" value="Удалить">
            </form>
            </td>
        </tr>

    @endforeach

    </tbody>
</table>

{{--Верстка добавления инфо в БД--}}
<form method="post" action="{{route('storage.addPublication')}}">
    @csrf
    <div>
        <h1>Ввести новые сведения:</h1>
        <label> Автор: </label>
        <input type="text" name="author">
        <label> Заголовок: </label>
        <input type="text" name="title">
        <label> Содержимое: </label>
        <input type="text" name="text">
        <div><input type="submit" name="register" value="Ввести в базу"></div>
    </div>
</form>
</body>
</html>

