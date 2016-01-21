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

	    	@if (Auth::check())
	    	<div ui-sref="add" ng-click="go('/add')">
		        <input type="text" class="form-control" placeholder="Write something..." readonly="true" onfocus="this.blur()" style="background-color:white" />
		        <hr />
	        </div>
	        @endif

		    <div ui-view="HomeView"></div>	
			<div ui-view="RedirectView" ng-hide="redirect.home===true"></div>

		    <!-- Laravel 5 posts -->
		    <!-- post preloader -->
		    <div ng-show="page.loaded===false">
				@foreach($posts as $post)
					@foreach($post->tags as $tag)
						<h4><a href="/tag/{{$tag->id}}#/list"><span style="background:rgb(238, 238, 238);margin-right:5px;display:inline-block;border-radius:5px;padding:5px;color:#474747">{{$tag->name}}</span></a>
			            <span style="background:rgb(238, 238, 238);margin-right:5px;display:inline-block;border-radius:5px;padding:5px;color:#474747">{{$post->author->author_prefix}}</span>
			            {{$post->title}}</h4>
				        <p style="padding-bottom:10px">
				        {{substr($post->body, 0, 250)}}<span>...</span>
				        </p>
                        <div class="photo-grid">
                            <div class="row first-row">
                                <div class="col box-1 box-padding">
                                    <a href="http://i.dailymail.co.uk/i/pix/2013/10/02/article-2441512-02650200000005DC-411_634x380.jpg" class="image-holder" data-lightbox="photogrid_l5{{$post->id}}" data-title="<div class='view-post'><a href='/post/{{$post->id}}/#/detail'>View post</a></div><div class='caption'>A very fast car photo</div>" style="background-image: url('http://i.dailymail.co.uk/i/pix/2013/10/02/article-2441512-02650200000005DC-411_634x380.jpg');"></a>
                                </div>
                                <div class="col box-2">
                                    <a href="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" class="image-holder" data-lightbox="photogrid_l5{{$post->id}}" data-title="<div class='view-post'><a href='/post/{{$post->id}}/#/detail'>View post</a></div><div class='caption'>A very fast car photo</div>" style="background-image: url('http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg');"></a>
                                </div>
                            </div>
                            <div class="row second-row">
                                <div class="col box-2 box-padding">
                                    <a href="http://i.dailymail.co.uk/i/pix/2013/10/02/article-2441512-02650200000005DC-411_634x380.jpg" class="image-holder" data-lightbox="photogrid_l5{{$post->id}}" data-title="<div class='view-post'><a href='/post/{{$post->id}}/#/detail'>View post</a></div><div class='caption'>A very fast car photo</div>" style="background-image: url('http://i.dailymail.co.uk/i/pix/2013/10/02/article-2441512-02650200000005DC-411_634x380.jpg');"></a>
                                </div>
                                <div class="col box-1">
                                    <a href="http://i.dailymail.co.uk/i/pix/2013/10/02/article-2441512-02650200000005DC-411_634x380.jpg" class="image-holder" data-lightbox="photogrid_l5{{$post->id}}" data-title="<div class='view-post'><a href='/post/{{$post->id}}/#/detail'>View post</a></div><div class='caption'>A very fast car photo</div>" style="background-image: url('http://i.dailymail.co.uk/i/pix/2013/10/02/article-2441512-02650200000005DC-411_634x380.jpg');"></a>
                                </div>
                            </div>
                        </div>
						<div class="text-right" style="padding:15px 0 0 0;">
							<a href="/post/{{$post->id}}/">Details</a>
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
	  	<h5>Download and try Stream</h5>
	  	<p>
	  		<a href="https://github.com/puffstream/stream" target="_blank">Click here</a> to go to Stream's Github page.
	  	</p>
	  	<!--
		<p>
	  		<a href="javascript:void(0)" class="features link">Available and upcoming features.</a>
	  	</p>
		-->
	  </div>
	</div>
	<div class="panel panel-default">
	  <div class="panel-body">
	  	<div class="row">
		  	<div class="col-xs-12 text-center">
                <ul class="rrssb-buttons clearfix">
                    <li class="rrssb-facebook">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=http://www.puffstream.com/stream" class="popup">
                        <span class="rrssb-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29 29"><path d="M26.4 0H2.6C1.714 0 0 1.715 0 2.6v23.8c0 .884 1.715 2.6 2.6 2.6h12.393V17.988h-3.996v-3.98h3.997v-3.062c0-3.746 2.835-5.97 6.177-5.97 1.6 0 2.444.173 2.845.226v3.792H21.18c-1.817 0-2.156.9-2.156 2.168v2.847h5.045l-.66 3.978h-4.386V29H26.4c.884 0 2.6-1.716 2.6-2.6V2.6c0-.885-1.716-2.6-2.6-2.6z"/></svg></span>
                        <span class="rrssb-text">facebook</span>
                        </a>
                    </li>
                    <li class="rrssb-twitter">
                        <a href="https://twitter.com/intent/tweet?text=With%20Stream%20you%20can%20write%20something%2C%20then%20watch%20the%20web%20come%20to%20you.%20http%3A%2F%2Fwww.puffstream.com%2Fstream%20%23stream%20via%20%40puffstream"
                        class="popup">
                        <span class="rrssb-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28"><path d="M24.253 8.756C24.69 17.08 18.297 24.182 9.97 24.62a15.093 15.093 0 0 1-8.86-2.32c2.702.18 5.375-.648 7.507-2.32a5.417 5.417 0 0 1-4.49-3.64c.802.13 1.62.077 2.4-.154a5.416 5.416 0 0 1-4.412-5.11 5.43 5.43 0 0 0 2.168.387A5.416 5.416 0 0 1 2.89 4.498a15.09 15.09 0 0 0 10.913 5.573 5.185 5.185 0 0 1 3.434-6.48 5.18 5.18 0 0 1 5.546 1.682 9.076 9.076 0 0 0 3.33-1.317 5.038 5.038 0 0 1-2.4 2.942 9.068 9.068 0 0 0 3.02-.85 5.05 5.05 0 0 1-2.48 2.71z"/></svg></span>
                        <span class="rrssb-text">twitter</span>
                        </a>
                    </li>
                </ul>
			</div>
	  	</div>
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