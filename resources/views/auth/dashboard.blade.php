<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    <div class="container">
      <h5><a href="{{route('logout')}}">Logout</a></h5>
      <h3>Dashboard</h3>
      <hr>
      <div class="row">
        <ul>
          <li><a href="{{route('all_requests')}}"> All Requests</a></li>
          <li><a href="{{route('manage_currencies')}}"> Currencies</a></li>
        </ul>
      </div>
    </div>
  </body>
</html>
