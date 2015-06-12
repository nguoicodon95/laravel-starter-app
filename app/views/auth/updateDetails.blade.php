@if(Auth::check())
<div class="row">
  <div class="col-xs-12 inner-side-wrap">
    <div class="side-nav edit-profile">
        <h4>Update Account Details</h4>
        {{ Form::open(array('url' => 'edituser/' . Auth::user()->id)) }}
          <div class="form-group">
            {{ Form::label('editUsername', 'Username') }}
            {{ Form::text('editUsername', Auth::user()->username, array('class' => 'form-control')) }}
          </div>
          <div class="form-group">
            {{ Form::label('editPassword', 'Password') }}
            {{ Form::text('editPassword', null, ['class' => 'form-control']) }}
          </div>
          {{ Form::submit('Edit', ['class' => 'btn btn-default']) }}
        {{ Form::close() }}
      </div>
  </div>
</div>
@endif