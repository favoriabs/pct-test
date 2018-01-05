<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    <div class="container">
      <h3>Login</h3>
      <hr>
      <div class="row">
        <div class="col-md-8">
          <form method="post" action="{{route('login')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="Email" name="email">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
        <div class="col-md-4">
          @include('layouts.errors')
          @include('layouts.session')
        </div>
      </div>
    </div>
  </body>
</html>
