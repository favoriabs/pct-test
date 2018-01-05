<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>All Currencies</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    <div class="container">
      <h3>All Currencies</h3>
      <hr>
      <a href="{{route('create_currency')}}">Create Currency</a>
      <div class="row">
        <div class="col-md-8">
          <table class="table table-hover">
            <tr>
              <th>S/N</th>
              <th>Short Name</th>
              <th>Long Name</th>
              <th>Naira Equivalent</th>
              <th colspan="2">Actions</th>
            </tr>
            @foreach($currencies as $currency)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$currency->short_name}}</td>
                <td>{{$currency->long_name}}</td>
                <td>{{$currency->naira_equivalent}}</td>
                <td>
                  <a class="btn btn-default" href="{{route('edit_currency', $currency->id)}}">Edit</a>
                </td>
                <td>
                  <a class="btn btn-default" href="{{route('delete_currency', $currency->id)}}">Delete</a>
                </td>
              </tr>
            @endforeach
          </table>
        </div>
        <div class="col-md-4">
          @include('layouts.errors')
          @include('layouts.session')
        </div>
      </div>
    </div>
  </body>
</html>
