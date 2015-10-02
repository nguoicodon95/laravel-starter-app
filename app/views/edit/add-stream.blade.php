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
	            <input type="text" ng-model="title" placeholder="Add title" class="form-control" style="padding-top:2px;padding-bottom:2px;width:100%;height:auto;display:inline-block;font-size:25px;" />
	        </div>
	        <div class="form-group">
	        	<textarea class="form-control" ng-model="body" placeholder="Write something.." style="height:300px;font-size:17px;"></textarea>
	        </div>
	        <div class="well text-center">
	        	<button type="button" class="btn btn-primary" style="font-size:17px">Select photos for post</button>
	    	</div>
	        <!--
	        <div style="padding:0 30px">
	            <div class="row" style="margin-bottom:10px;">
	                <div class="col-xs-12 col-sm-5 left-photo">
	                    <div>
	                        <img src="http://i.dailymail.co.uk/i/pix/2013/10/02/article-2441512-02650200000005DC-411_634x380.jpg" />
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-7 right-photo">
	                    <div>
	                        <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" />
	                    </div>
	                </div>
	            </div>
	            <div class="row hidden-xs">
	                <div class="col-xs-7" style="padding-right:10px;">
	                    <div style="overflow:hidden">
	                        <img src="http://i.dailymail.co.uk/i/pix/2013/10/02/article-2441512-02650200000005DC-411_634x380.jpg" style="height:182px;" />
	                    </div>
	                </div>
	                <div class="col-xs-5" style="padding-left:0;">
	                    <div style="overflow:hidden">
	                        <img src="http://i.dailymail.co.uk/i/pix/2013/10/02/article-2441512-02650200000005DC-411_634x380.jpg" style="height:182px;" />
	                    </div>
	                </div>
	            </div>
	        </div>
	    	-->
	    </div>
	  </div>
	</div>
@stop
@section('right')
	<div class="panel panel-default">
	  <div class="panel-body">
		{{ Form::open(array('url' => 'stream')) }}
			<input type="text" name="title" value="<% title %>" />
			<textarea name="body"><% body %></textarea>
			<input type="text" name="name" value="{{strtolower(Session::get('newtag'))}}" />
		  	<h5>Tags</h5>
	        <span style="background:rgb(238, 238, 238);margin-right:5px;display:inline-block;border-radius:5px;padding:5px;color:#474747">
	        	<?php echo strtolower(Session::get('newtag')); ?>
	        </span>
	        <span style="background:rgb(238, 238, 238);margin-right:5px;display:inline-block;border-radius:5px;padding:5px;color:#474747">JS</span>
		    <hr />
		    <div class="form-group">
			    <div>
			    	<input type="radio" name="withpost" checked /> post and photos
			    </div>
		    	<div>
					<input type="radio" name="withpost" /> photos only
		    	</div>
	    	</div>
	    	<hr />
			<div class="form-group">
				<input type="checkbox" name="location" /> personal stream
			</div>
			<hr />
	    	<div class="form-group">
	        	<button type="submit" class="btn btn-primary" style="font-size:17px">Publish</button>
	    	</div>
		    <hr />
		    <h5>Found:</h5>
		    <ul>
		    	<li>Flickr [7]</li>
		    </ul>
	  	{{ Form::close() }}
	  </div>
	</div>
@stop