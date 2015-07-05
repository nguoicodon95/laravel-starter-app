@extends('layouts.default')
@section('title')
@include('partials.title')
@stop
@section('list')
<div id="columns" class="salvattore-wrapper" data-columns>
@foreach($post as $key => $value)
<div class="panel panel-primary">
	<div class="panel-heading">
	    @if (Auth::check())
	    <a href="edit/{{ $value->id }}">{{ $value->title }}</a>
	    @else
	    <a href="detail/{{ $value->id }}">{{ $value->title }}</a>
	    @endif
	</div>
	@if($value->file->count() > 0)   
	  @if (Auth::check())     
	  <a href="edit/{{ $value->id }}"><img src="{{ $value->file[0]->file_thmb_url }}" /></a>
	  @else
	  <a href="detail/{{ $value->id }}"><img src="{{ $value->file[0]->file_thmb_url }}" /></a>
	  @endif           
	@endif
	<div class="panel-body">
	  {{ str_limit($value->post, $limit = 350, $end = '...') }}
	  <br />
	  <div class="panel-buttons">
	    @if (Auth::check())
	      <button type="button" class="btn btn-primary btn-xs edit-button" data-link="edit/{{ $value->id }}">Edit</button>
	    @else
	    <button type="button" class="btn btn-primary btn-xs link-button" data-link="detail/{{ $value->id }}">View</button>
	    @endif
	  </div>
	</div> 
</div> 
@if (count($post) === $key + 1)
<script>window.ready=true</script>
@endif
@endforeach
</div>
@stop