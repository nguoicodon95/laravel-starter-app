@if (Auth::check())
  <h4>What's happening?</h4>
  {{ Form::open(array('url' => 'stream', 'files' => true)) }}
  <div class="form-group">
  {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Add a title']) }}
  </div>
  <div class="form-group">
  {{ Form::textarea('post', null, ['class' => 'form-control', 'placeholder' => 'Add a post', 'style' => 'height:100px;']) }}
  </div>
  <div class="form-group">
  {{ Form::label('file', 'Add an image') }}
  {{ Form::file('file', ['class' => 'form-control']) }}
  </div>
  {{ Form::submit('Add', ['class' => 'btn btn-default']) }}
  {{ Form::close() }}
@endif