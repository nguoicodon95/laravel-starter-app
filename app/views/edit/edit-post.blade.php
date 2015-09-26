@extends('layouts.default')
@section('left')
	<div class="panel panel-default">
		<div class="panel-body">
		<h4>James Star</h4>
		<ul>
		    <li>4 Streams</li>
		    <li>22 Posts</li>
		    <li>300 Photos</li>
		</ul>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
		<h4>Stream stats</h4>
		<ul>
		    <li>44 Streams</li>
		    <li>220 Posts</li>
		    <li>6000 Photos</li>
		</ul>
		</div>
	</div>
@stop
@section('center')
	<div class="panel panel-default">
	  <div class="panel-body">
	    <div style="padding:10px;">
	        <div class="form-group">
	            <input type="text" placeholder="Add title" value="Cars are awesome" class="form-control" style="padding-top:2px;padding-bottom:2px;width:100%;height:auto;display:inline-block;font-size:25px;" />
	        </div>
	        <div class="form-group">
	        	<textarea class="form-control" placeholder="Write something.." style="height:300px;font-size:17px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</textarea>
	        </div>
	        <div class="well text-center">
	        	<button type="button" class="btn btn-primary" style="font-size:17px">Re-select photos</button>
	    	</div>
	    </div>
	  </div>
	</div>
@stop
@section('right')
	<div class="panel panel-default">
	  <div class="panel-body">
	  	<h5>Tags</h5>
        <span style="background:rgb(238, 238, 238);margin-right:5px;display:inline-block;border-radius:5px;padding:5px;color:#474747">Cars</span>
        <span style="background:rgb(238, 238, 238);margin-right:5px;display:inline-block;border-radius:5px;padding:5px;color:#474747">JS</span>
	    <hr />
    	<div class="form-group">
        	<button type="button" class="btn btn-primary" style="font-size:17px">Save</button>
    	</div>
	    <hr />
	    <h5>Found:</h5>
	    <ul>
	    	<li>Flickr [7]</li>
	    </ul>
	  </div>
	</div>
@stop