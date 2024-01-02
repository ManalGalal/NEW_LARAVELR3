<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Post</title>
</head>
<body>
<div class="container">
  <h2>Show Posts data</h2>
  <form action="{{route('showPost',$posts->id)}}" method="post">
    @csrf
    <h1>{{$posts->title}}</h1>
    <h1>{{$posts->description}}</h1>
    <h1>{{$posts->author}}</h1>
    <h1>{{$posts->created_at}}</h1>
    <h1>{{$posts->updated_at}}</h1>
    <p>{{ $posts->published? "Published" : "Not Published" }}</p>
    
    </div>
</body>
</html>