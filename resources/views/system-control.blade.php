<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <!--TODO(Link hinzufügen)-->
        <a href="{{ route('logout') }}"></a>

        <a href="{{route('question.index')}}">Fragenkatalog</a>
        <a href="{{route('category-add')}}">Kategorie hinzufügen</a>
        <a href="{{route('category.index')}}">Kategorie bearbeiten</a>
</body>
</html>
