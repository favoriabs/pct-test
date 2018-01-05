<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create Currency</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    <div class="container">
      <h3>Create Currency</h3>
      <hr>
      <div class="row">
        <div class="col-md-8">
          <form method="post" action="{{route('save_currency')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label>Short Name</label>
              <input type="text" class="form-control" placeholder="Short Name" name="short_name">
            </div>
            <div class="form-group">
              <label>Long Name</label>
              <input type="text" class="form-control" placeholder="Long Name" name="long_name">
            </div>
            <div class="form-group">
              <label>Naira Eqivalent</label>
              <input type="text" class="form-control" placeholder="Naira Equivalent" name="naira_equivalent">
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
