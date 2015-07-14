@extends('layouts.default')
@section('title')
    <div class="h1"><a href="/stream">Stream - base product</a> | <a href="/stream">back</a></div>
@stop
@section('detail')
@foreach($post as $key => $value)
<div class="col-xs-12 content-block">
  <div class="row gray-border no-margin">
    <div class="col-xs-12 gray-btm-border-only">
      <h4>{{ $value->title }}</h4>
    </div>
    @if($value->file->count() > 0)     
    <div class="smaller-phones col-xs-6 large-image">   
      <img src="/{{ $value->file[0]->file_url }}" />       
    </div>          
    @endif
    <div class="smaller-phones col-xs-6 text-block">
      <?php $p = new PostHelper(); echo $p->detail($value->post); ?>
    </div>
  </div>
</div>
@endforeach
@stop