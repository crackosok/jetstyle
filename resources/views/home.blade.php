<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Articles</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
    <h1>@if (isset($tag)) Articles with tag {{$tag}} <a href="/">back</a> @else All articles @endif</h1>
        @foreach($articles as $article)
            @include('subviews/article', ['article' => $article])
        @endforeach
    </div>
    </body>
</html>