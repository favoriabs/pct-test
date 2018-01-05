<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>All Requests</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    <div class="container">
      <h3>All Requests</h3>
      <hr>
      <div class="row">
        <div class="col-md-8">
          <table class="table table-hover">
            <tr>
              <th>S/N</th>
              <th>Name</th>
              <th>Email</th>
              <th>Passport Number</th>
              <th>Request Type</th>
              <th>Travel Date</th>
              <th>Amount Requested</th>
              <th>Currency</th>
            </tr>
            @foreach($requests as $request)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$request->full_name}}</td>
                <td>{{$request->email}}</td>
                <td>{{$request->passport_number}}</td>
                <td>{{$request->request_type}}</td>
                <td>{{$request->date_of_travel}}</td>
                <td>{{$request->amount_needed}}</td>
                <td>{{$request->currency}}</td>
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
