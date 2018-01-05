@if (count($errors) > 0)
    <div class="col-md-12">
        <ul>
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    <span>{{$error}}</span>
                </div>
            @endforeach
        </ul>
    </div>
@endif
