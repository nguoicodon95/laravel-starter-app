@if(Session::has('flash_notice'))
<div class="alert alert-info" role="alert">
  <div id="flash_notice">{{ Session::get('flash_notice') }}</div>
</div>
@endif

@if (Session::has('flash_error'))
<div class="alert alert-danger" role="alert">
    <div id="flash_error">{{ Session::get('flash_error') }}</div>
</div>
@endif