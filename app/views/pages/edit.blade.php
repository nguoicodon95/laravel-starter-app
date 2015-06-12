@extends('layouts.default')
@section('title')
    <div class="h1"><a href="/stream">Stream - base product</a> | <a href="/stream">back</a></div>
@stop
@section('edit')
@foreach($post as $key => $value)
<div class="col-xs-12 content-block">
  <div class="row gray-border no-margin">
    <div class="col-xs-12">
      {{ Form::model($value, array('route' => array('stream.update', $value->id), 'method' => 'PUT', 'files' => true)) }}
        <div class="form-group">
          <div class="row">
            <div class="col-xs-12 col-md-10">
              {{ Form::label('title', 'Title') }}
              {{ Form::text('title', $value->title, ['class' => 'form-control']) }}
            </div>
          </div>
        </div>
        <div class="form-group">
        @if($value->file->count() > 0)       
          <input type="button" onclick="javascript:$('.deleteImageForm').submit()" class="btn btn-default" value="Delete image" /><br />
          <img src="/{{ $value->file[0]->file_url }}" class="large-image" />
        @else
          {{ Form::label('file2', 'Add an image') }}
          {{ Form::file('file2', ['class' => 'form-control']) }}
        @endif
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-xs-12 col-md-10">
              {{ Form::label('post', 'Description') }}
              {{ Form::textarea('post', $value->post, ['class' => 'form-control']) }}
            </div>
          </div>
        </div>
        {{ Form::submit('Update', ['class' => 'btn btn-default']) }}
        <input type="button" onclick="javascript:$('.deleteForm').submit()" class="btn btn-default" value="Delete" />
        <input type="button" onclick="javascript:location.href='/'" class="btn btn-default" value="Cancel" />
      {{ Form::close() }}
    </div>
    <div class="hidden-form">
      @foreach($post as $key => $value)
      {{ Form::open(array('url' => 'stream/' . $value->id, 'class' => 'deleteForm')) }}
      @if($value->file->count() > 0) 
      {{ Form::hidden('picture', $value->file[0]->id) }}
      @endif
      {{ Form::hidden('_method', 'DELETE') }}
      {{ Form::submit() }}
      {{ Form::close() }}
      @endforeach

      @foreach($post as $key => $value)
      {{ Form::open(array('url' => 'deleteimage/' . $value->id, 'class' => 'deleteImageForm')) }}
      @if($value->file->count() > 0) 
      {{ Form::hidden('picture', $value->file[0]->id) }}
      @endif
      {{ Form::submit() }}
      {{ Form::close() }}
      @endforeach
    </div>
  </div>
</div>
@endforeach
@stop