@if (!Auth::check())
  {{ Form::open(array('url' => 'login')) }}
  <div class="form-group">
      {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) }}
  </div>
  <div class="form-group">
      {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
  </div>
  <div class="form-group">
    {{ Form::submit('Login', ['class' => 'btn btn-default']) }}
  </div>
  {{ Form::close() }}
@endif