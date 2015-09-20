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
				  <li role="presentation" class="active"><a href="/forms/tags">Tags</a></li>
				  <li role="presentation"><a href="/forms/photos">Photos</a></li>
				  <li role="presentation"><a href="/forms/posts">Posts</a></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<h1>Tags</h1>
			</div>
			<div class="col-xs-6">
				<h3>Add a tag</h3>
				{{ $posts }}
				{{ Form::open(array('url' => 'api/v1/tags')) }}
						{{ Form::hidden('type', 'tag') }}
					<div class="form-group">
						{{ Form::label('name', 'Name') }}
        				{{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'tag')) }}
					</div>
					<div class="form-group">
						{{ Form::submit('Add', array('class' => 'form-control')) }}
					</div>
				{{ Form::close() }}
			</div>
			<div class="col-xs-6">
				<h3>List of tags</h3>
				<table class="table">
					<tbody>
						<tr>
							<th>Name</th>
							<th></th>
						</tr>
						@foreach($tags as $key => $value)
						<tr>
							<td>{{ $value->name }}</td>
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