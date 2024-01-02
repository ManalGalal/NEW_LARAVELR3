<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('includes.navPost')
<div class="container">
  <h2>Trashed Posts List</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Author</th>
        <th>Published</th>
        <th>Restore</th>

        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
      <tr>
        <td>{{$post->title}}</td>
        <td>{{$post->description}}</td>
        <td>{{$post->author}}</td>
        <td>
            @if($post->published)
                Yes
            @else
                No
            @endif

        </td>
        <td><a href= "restorePost/{{$post->id}} "onclick="return confirm('Are you sure you want to Restore?')"> Restore</td>

        <td><a href= "forceDelete/{{$post->id}} "onclick="return confirm('Are you sure you want to delete?')">Force Delete</td>

      </tr>      
      <!-- <tr class="success">
        <td>Success</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr class="danger">
        <td>Danger</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr class="info">
        <td>Info</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
      <tr class="warning">
        <td>Warning</td>
        <td>Refs</td>
        <td>bo@example.com</td>
      </tr>
      <tr class="active">
        <td>Active</td>
        <td>Activeson</td>
        <td>act@example.com</td>
      </tr> -->
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>

