@if (isset($errors) && count($errors) > 0)
    <div class="flash flash--error">
        <strong>Something went wrong!</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li><b>{{ $error }}</b></li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::has('status') > 0)
    <div class="flash flash--success">
          <p><b>{{Session::get('status')}}</b></p>
    </div>
@endif