<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Make request page</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    <div class="container">
      <h3>Make Request</h3>
      <hr>
      <div class="row">
        <div class="col-md-8">
          <form method="post" action="{{route('save_request')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label>Full Name</label>
              <input type="text" class="form-control" placeholder="Full Name" name="full_name">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" placeholder="Email" name="email">
            </div>
            <div class="form-group">
              <label>Passport Number</label>
              <input type="text" class="form-control" placeholder="Passport Number" name="passport_number">
            </div>
            <div class="form-group">
              <label>Request Type</label>
              <select class="form-control" name="request_type">
                <option value="BTA">BTA</option>
                <option value="PTA">PTA</option>
              </select>
            </div>
            <div class="form-group">
              <label>Travel Date</label>
              <input type="date" class="form-control" name="date_of_travel">
            </div>
            <div class="form-group">
              <label>Amount Requested</label>
              <input type="number" class="form-control" name="amount_needed">
            </div>
            <div class="form-group">
              <label>Currency</label>
              <select class="form-control" name="currency">
                @foreach($currencies as $currency)
                  <option value="{{$currency->short_name}}">{{$currency->long_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Air Ticket</label>
              <input type="file" accept="image/*" name="air_ticket">
            </div>

            <div class="form-group">
              <label>Passport</label>
              <input type="file" accept="image/*" name="passport">
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
