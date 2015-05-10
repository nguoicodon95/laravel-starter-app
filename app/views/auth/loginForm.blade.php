@if (!Auth::check())
  {{ Form::open(array('url' => 'login')) }}
  <p>
      {{ Form::label('username', 'Username') }}<br/>
      {{ Form::text('username') }}
  </p>
  <p>
      {{ Form::label('password', 'Password') }}<br/>
      {{ Form::password('password') }}
  </p>
  <p>{{ Form::submit('Login') }}</p>
  {{ Form::close() }}
@endif