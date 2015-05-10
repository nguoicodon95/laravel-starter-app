@if (Auth::check())
  {{ Form::open(array('url' => 'stream', 'files' => true)) }}
  <div class="form-group">
  {{ Form::label('title', 'Add title') }} <br />
  {{ Form::text('title', null) }}
  </div>
  <div class="form-group">
  {{ Form::label('post', 'Add post') }}
  {{ Form::textarea('post', null, array('class' => 'form-control', 'style' => 'height:100px;')) }}
  </div>
  <div class="form-group">
  {{ Form::label('file', 'File') }}
  {{ Form::file('file') }}
  </div>
  {{ Form::submit('Add') }}
  {{ Form::close() }}
@endif