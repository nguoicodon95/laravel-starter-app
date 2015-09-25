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
	        <h4 style="font-size:32px;padding-bottom:10px;margin-bottom:10px;">
	            <input type="text" placeholder="Add title" class="form-control" style="padding-top:0;padding-bottom:0;width:100%;height:auto;display:inline-block;font-size:32px;" />
	        </h4>
	        <p style="font-size:17px;line-height:24px;padding-bottom:10px">
	        	<textarea class="form-control" placeholder="Write something.." style="height:300px;font-size:17px;"></textarea>
	        </p>
	        <div class="text-center">
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
	  	<h5>Tag / User</h5>
        <span style="background:rgb(238, 238, 238);margin-right:5px;display:inline-block;border-radius:5px;padding:5px;color:#474747">Cars</span>
        <span style="background:rgb(238, 238, 238);margin-right:5px;display:inline-block;border-radius:5px;padding:5px;color:#474747">JS</span>
	    <hr />
	    <h5>Recent tags</h5>
	    <a href="#">Cars</a>
	    <hr />
	    <h5>Find us</h5>
	    <ul>
	        <li><a href="#">Twitter</a></li>
	        <li><a href="#">YouTube</a></li>
	    </ul>
	  </div>
	</div>
@stop