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
				  <li role="presentation" class="active"><a href="/forms/photos">Photos</a></li>
				  <li role="presentation"><a href="/forms/posts">Posts</a></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<h1>Photos</h1>
			</div>
			<div class="col-xs-6">
				<h3>Add a photo</h3>
				{{ Form::open(array('url' => 'api/v1/photos', 'files' => true)) }}
					<div class="form-group">
						{{ Form::label('title', 'Title') }}
        				{{ Form::text('title', Input::old('title'), array('class' => 'form-control', 'placeholder' => 'Title')) }}
					</div>
					<!-- Add tags drop-down here -->
					<div class="form-group">
						<!-- array_merge(['' => 'Select'], $tags) -->
						{{ Form::label('tag', 'Tag') }}
						{{ Form::select('tag', array_merge([0 => 'Select'], $tags), null, array('class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('description', 'Description') }}
        				{{ Form::textarea('description', Input::old('description'), array('class' => 'form-control', 'placeholder' => 'Description', 'size' => '20x5')) }}
					</div>
					<div class="form-group">
						{{ Form::label('photo', 'Photo') }}
        				{{ Form::file('photo', array('class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::submit('Add', array('class' => 'form-control')) }}
					</div>
				{{ Form::close() }}
			</div>
			<div class="col-xs-6">
				<h3>List of photos</h3>
				<table class="table">
					<tbody>
						<tr>
							<th>Photos</th>
							<th></th>
						</tr>
						@foreach($photos as $key => $value)
						<tr>
							<td><img src="{{ $value->url }}" style="width:150px;" /></td>
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