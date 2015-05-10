@extends('layouts.default')
@section('title')
    <div class="h1"><a href="/stream">Stream - base product</a> | <a href="/stream">back</a></div>
@stop
@section('edit')
@foreach($post as $key => $value)
<div class="col-xs-12 content-detail">
  <div class="row gray-border no-margin">
    <div class="col-xs-12">
      {{ Form::model($value, array('route' => array('stream.update', $value->id), 'method' => 'PUT', 'files' => true)) }}
        <div class="form-group">
            {{ Form::label('title', 'Title') }} <br />
            {{ Form::text('title', $value->title) }}
        </div>
        <div class="form-group">
        @if($value->file->count() > 0)       
          <input type="button" onclick="javascript:$('.deleteImageForm').submit()" value="Delete image" /><br />
          <img src="/{{ $value->file[0]->file_url }}" class="large-image" />
        @else
          {{ Form::label('file2', 'File') }}
          {{ Form::file('file2') }}
        @endif
        </div>
        <div class="form-group">
            {{ Form::label('post', 'Post') }} <br />
            {{ Form::textarea('post', $value->post) }}
        </div>
        {{ Form::submit('Update') }}
        <input type="button" onclick="javascript:$('.deleteForm').submit()" value="Delete" />
        <input type="button" onclick="javascript:location.href='/'" value="Cancel" />
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