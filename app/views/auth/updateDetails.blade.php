@if(Auth::check())
<div class="row">
  <div class="col-xs-12 inner-side-wrap">
    <div class="side-nav edit-profile">
        <h2>Edit Profile</h2>
        {{ Form::open(array('url' => 'edituser/' . Auth::user()->id)) }}
          {{ Form::label('editUsername', 'Username') }}
          {{ Form::text('editUsername', Auth::user()->username) }}<br />
          {{ Form::label('editPassword', 'Password') }}
          {{ Form::text('editPassword') }}<br /><br />
          {{ Form::submit('Edit') }}
        {{ Form::close() }}
      </div>
  </div>
</div>
@endif