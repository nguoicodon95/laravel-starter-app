@extends('layouts.default')
@section('left')
	<div class="panel panel-default">
		<div class="panel-body">
			<h4>Stream stats</h4>
			<ul class="totals">
				<li>Streams&nbsp;&nbsp;<span class="stream-total badge" style="background-color:#eeeeee;color:black;font-weight:normal;">0</span></li>
				<li>Posts&nbsp;&nbsp;<span class="post-total badge" style="background-color:#eeeeee;color:black;font-weight:normal;">0</span></li>
			</ul>
		</div>
	</div>
	@if (Auth::check())
	<div class="panel panel-default user-totals-wrapper">
		<div class="panel-body">
		<h4 class="username">&nbsp;</h4>
		<ul class="user-totals">
		    <li>Streams&nbsp;&nbsp;<span class="stream-total badge" style="background-color:#eeeeee;color:black;font-weight:normal;">0</span></li>
		    <li>Posts&nbsp;&nbsp;<span class="post-total badge" style="background-color:#eeeeee;color:black;font-weight:normal;">0</span></li>
		</ul>
		</div>
	</div>
	@endif
@stop
@section('center')
	<div class="ng-panel panel panel-default">
	  <div class="panel-body">
	    <div style="padding:10px;">

			<h3 style="margin:0 0 20px 0">Search results:</h3>

		    <!-- Laravel 5 posts -->
		    <!-- post preloader -->
		    <div>
				@foreach($posts as $post)
					@foreach($post->tags as $tag)
						<h4><a href="/tag/{{$tag->id}}#/list"><span style="background:rgb(238, 238, 238);margin-right:5px;display:inline-block;border-radius:5px;padding:5px;color:#474747">{{$tag->name}}</span></a>
			            <span style="background:rgb(238, 238, 238);margin-right:5px;display:inline-block;border-radius:5px;padding:5px;color:#474747">{{$post->author->author_prefix}}</span>
			            {{$post->title}}</h4>
				        <p style="padding-bottom:10px">
				        {{substr($post->body, 0, 250)}}<span>...</span>
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
						<div class="text-right" style="padding:15px 0 0 0;">
							<a href="/post/{{$post->id}}/detail">Details</a>
						</div>
				        <hr />
					@endforeach
				@endforeach
			</div>

	    </div>
	  </div>
	</div>
@stop
@section('right')
	<div class="panel panel-default">
	  <div class="panel-body">
	    <h5>Recent streams @if (Auth::check())<a href="tag/e/edit/" class="text-muted">(edit)</a>@endif</h5>
	    <div class="recent-tags"></div>
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