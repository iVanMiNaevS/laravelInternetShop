<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/category" method="post">
        @csrf
        @method('POST')
        <input type="text" placeholder="name cat" id="name" name="name">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" placeholder="desc cat" name="description">
        <button type="submit">отправить</button>
    </form>

    <ul>
        @foreach($cats as $cat)
        <li>{{$cat->name}}</li>
        @endforeach
    </ul>
</body>

</html>