@extends('layouts.default')
@section('title')
@include('partials.title')
@stop
@section('list')
<?php (Auth::check()) ?  $action = "edit" : $action = "detail"; ?>
<?php (Auth::check()) ?  $actionLabel = "Edit" : $actionLabel = "View"; ?>
<div id="columns" class="salvattore-wrapper" data-columns>
@foreach($post as $key => $value)
<div class="panel panel-primary">
	<div class="panel-heading">
	    <a href="{{ $action }}/{{ $value->id }}">{{ $value->title }}</a>
	</div>
	@if($value->file->count() > 0)
	  	<a href="{{ $action }}/{{ $value->id }}"><img src="{{ $value->file[0]->file_thmb_url }}" /></a>          
	@endif
	<div class="panel-body">
	  <a href="{{ $action }}/{{ $value->id }}" class="summary-description">
	  <?php
      $ParsedownHelper = new ParsedownHelper();
      $sanitized = htmlspecialchars($value->post, ENT_QUOTES);
      $parseText = $ParsedownHelper->line($sanitized);
      // now strip tags
      $stripTags = strip_tags($parseText);
      ?>
	  {{ str_limit($stripTags, $limit = 350, $end = '...') }}
	  <br />
	  </a>
	  <div class="panel-buttons">
	      <button type="button" class="btn btn-primary btn-xs edit-button" data-link="{{ $action }}/{{ $value->id }}">{{ $actionLabel }}</button>
	  </div>
	</div> 
</div> 
@if (count($post) === $key + 1)
<script>window.ready=true</script>
@endif
@endforeach
</div>
@stop