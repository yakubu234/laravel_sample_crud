<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel 5.8 CRUD Example Tutorial</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
  <div class="container">
  <br><br>
      
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>my sample crud app </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ url('create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if (Session::get('success'))
        <div class="alert alert-success">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif

    @if (Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ Session::get('error') }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Username</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->username }}</td>
            <td>{{ $post->fullname }}</td>
            <td>{{ $post->email }}</td>
            <td>{{ $post->status }}</td>
            <td>
                 <a class="btn btn-info" href="{{ url('show',$post->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ url('edit_post',$post->id) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ url('destroy',$post->id) }}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>

  </div>
</body>
</html>