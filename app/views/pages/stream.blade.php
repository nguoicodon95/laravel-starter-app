@extends('layouts.default')
@section('left')
	@if (Auth::check())
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
	@endif
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
	    	@if (Auth::check())
	        <input type="text" class="form-control" placeholder="Write something" />
	        <hr />
	        @endif

			@foreach($posts as $post)
				@foreach($post->tags as $tag)
				<h4>
	            <span style="background:rgb(238, 238, 238);margin-right:5px;display:inline-block;border-radius:5px;padding:5px;color:#474747">{{$tag->name}}</span>
	            <span style="background:rgb(238, 238, 238);margin-right:5px;display:inline-block;border-radius:5px;padding:5px;color:#474747">JS</span>
	            {{$post->title}}</h4>
		        <p style="padding-bottom:10px">
		        {{$post->body}}
		        </p>
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
		        <hr />

				@endforeach
			@endforeach

	    </div>
	  </div>
	</div>
@stop
@section('right')
	<div class="panel panel-default">
	  <div class="panel-body">
	    <h5>Recent tags</h5>
	    <a href="#">Cars</a>
	  </div>
	</div>
	<div class="panel panel-default">
	  <div class="panel-body">
	  	<h5>This website will be reset daily.</h5>
	  	<p>
	  		Use <span class="text-warning">admin@domain.com/password</span> to sign in and start testing Stream.
	  	</p>
	  	<p>
	  		<a href="javascript:void(0)" class="features link">All available and upcoming features.</a>
	  	</p>
	  </div>
	</div>
	<div class="panel panel-default">
	  <div class="panel-body">
		Puff Stream&nbsp;
		<a href="http://www.twitter.com/puffstream" target="_blank">Twitter</a>&nbsp; 
		<a href="https://www.facebook.com/PuffStreamPublications/" target="_blank">Facebook</a>&nbsp;
		<a href="https://www.linkedin.com/company/puff-stream">LinkedIn</a>&nbsp;
		<a href="https://www.youtube.com/user/puffstream" target="_blank">YouTube</a>&nbsp;
		<a href="https://puffstream.atlassian.net/wiki/display/STREAM/Docs" target="_blank">Docs</a>&nbsp;
		<a href="http://puffstream.github.io/stream/" target="_blank">Devs</a>&nbsp;
		<a href="https://github.com/puffstream" target="_blank">Code</a>&nbsp;	
		<div style="display:inline-block">
			<div class="visible-xs visible-sm">
				<a href="/page/pricing" target="_blank">Pricing</a>&nbsp;
				<a href="/page/funding" target="_blank">Funding</a>	
			</div>
		</div>
	  </div>
	</div>
@stop