<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Puff Stream</title>
	<link href="/assets/css/styles.css" rel="stylesheet" />
  </head>
  <body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<div>&nbsp;</div>
				<ul class="nav nav-tabs">
				  <li role="presentation"><a href="/forms/tags">Tags</a></li>
				  <li role="presentation"><a href="/forms/photos">Photos</a></li>
				  <li role="presentation" class="active"><a href="/forms/posts">Posts</a></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<h1>Posts</h1>
			</div>
			<div class="col-xs-6">
				<h3>Add a post</h3>
				{{ $photos }}
				{{ Form::open(array('url' => 'api/v1/posts')) }}
					<div class="form-group">
						{{ Form::label('title', 'Title') }}
        				{{ Form::text('title', Input::old('title'), array('class' => 'form-control', 'placeholder' => 'Title')) }}
					</div>
					<div class="form-group">
						{{ Form::label('tag', 'Tag') }}
						{{ Form::select('tag', array_merge([0 => 'Select'], $tags), null, array('class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('summary', 'Summary') }}
        				{{ Form::textarea('summary', Input::old('summary'), array('class' => 'form-control', 'placeholder' => 'Summary', 'size' => '20x5')) }}
					</div>
						<div class="form-group">
						{{ Form::label('body', 'Body') }}
        				{{ Form::textarea('body', Input::old('body'), array('class' => 'form-control', 'placeholder' => 'Body')) }}
					</div>
					<div class="form-group">
						{{ Form::submit('Add', array('class' => 'form-control')) }}
					</div>
				{{ Form::close() }}
			</div>
			<div class="col-xs-6">
				<h3>List of posts</h3>
				<table class="table">
					<tbody>
						<tr>
							<th>Titles</th>
							<th></th>
						</tr>
						@foreach($posts as $key => $value)
						<tr>
							<td>{{ $value->title }}</td>
							<td>
								{{ Form::open(array('url' => 'api/v1/tags' . $value->id, 'class' => 'pull-left')) }}
				                    {{ Form::hidden('_method', 'DELETE') }}
				                    {{ Form::submit('Edit', array('class' => 'btn btn-default')) }}
				                    &nbsp;
				                {{ Form::close() }}

								{{ Form::open(array('url' => 'api/v1/tags' . $value->id, 'class' => 'pull-left')) }}
				                    {{ Form::hidden('_method', 'DELETE') }}
				                    {{ Form::submit('Delete', array('class' => 'btn btn-default')) }}
				                {{ Form::close() }}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
  </body>
</html>