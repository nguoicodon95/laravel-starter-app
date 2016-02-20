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

		    <div ui-view="ListView"></div>
			<div ui-view="RedirectView" ng-hide="redirect.tag===true"></div>

		    <!-- Laravel 5 posts -->
		    <!-- post preloader -->
		    <div ng-show="page.loaded===false">
				@foreach($tags as $tag)
					@foreach($tag->posts as $post)
						<h4><a href="/tag/{{$tag->id}}#/list"><span style="background:rgb(238, 238, 238);margin-right:5px;display:inline-block;border-radius:5px;padding:5px;color:#474747">{{$tag->name}}</span></a>
			            <span style="background:rgb(238, 238, 238);margin-right:5px;display:inline-block;border-radius:5px;padding:5px;color:#474747">{{$post->author->author_prefix}}</span>
			            {{$post->title}}</h4>
				        <p style="margin-bottom:0;">{{trim(substr($post->body, 0, 250))}}<span>...</span></p>
                        @if($post->photos->count() > 0)
                        <div style="height:20px;">&nbsp;</div>
                        @endif
                        <div class="photo-grid">
                            <div class="row first-row">
                                @foreach($post->photos as $index=>$photos)
                                    @if($post->photos->count() > 0)
                                        <?php $boxClass = ($index === 0) ? 'col box-1 box-padding' : 'col box-2'; ?>
                                        @if($index === 0 || $index == 1) 
                                        <div class="<?php echo $boxClass ?>">
                                            <a href="{{$photos->url}}" class="image-holder" data-lightbox="photogrid_ng{{$post->id}}" data-title="<div class='view-post'><a href='/post/{{$post->id}}/#/detail'>View post</a></div><div class='caption'>A very fast car photo</div>" style="background-image: url('{{$photos->url}}');"></a>                                            
                                        </div>
                                        @endif
                                    @endif
                                @endforeach
                                <!-- recommend button -->
                                @if($post->photos->count() === 1)
                                    <div class="col box-2">
                                        <a href="/signin" class="image-holder color-swatch gray-lighter recommend" style="position:relative;background-color:white;color:#7D7D7D;">
                                            <p style="position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;height:34px;z-index:10;text-align: center;font-size: 16px;">
                                                <button type="button" class="btn btn-default" style="width:85%">Recommend a photo</button>
                                            </p>
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="row second-row">
                                @foreach($post->photos as $index=>$photos)
                                    @if($post->photos->count() > 0)
                                        @if($post->photos->count() > 2)
                                            <?php $boxClass = ($index === 2) ? 'col box-2 box-padding' : 'col box-1'; ?>
                                            @if($index === 2 || $index == 3) 
                                            <div class="<?php echo $boxClass ?>">                                              
                                                <a href="{{$photos->url}}" class="image-holder" data-lightbox="photogrid_ng{{$post->id}}" data-title="<div class='view-post'><a href='/post/{{$post->id}}/#/detail'>View post</a></div><div class='caption'>A very fast car photo</div>" style="background-image: url('{{$photos->url}}');"></a>                                               
                                            </div>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                                <!-- recommend buttons -->
                                @if($post->photos->count() === 2)
                                    <div class="col box-optional">
                                        <a href="/signin" class="image-holder color-swatch gray-lighter recommend" style="position:relative;background-color:white;color:#7D7D7D;height:73px;overflow:visible;">
                                            <p style="position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;height:34px;z-index:10;text-align: center;font-size: 16px;">
                                                <button type="button" class="btn btn-default" style="width:75%">Recommend a photo</button>
                                            </p>
                                        </a>
                                    </div>
                                @endif
                                @if($post->photos->count() === 3)
                                <div class="col box-1">
                                    <a href="/signin" class="image-holder color-swatch gray-lighter recommend" style="position:relative;background-color:white;color:#7D7D7D;">
                                        <p style="position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;height:34px;z-index:10;text-align: center;font-size: 16px;">
                                            <button type="button" class="btn btn-default" style="width:75%">Recommend a photo</button>
                                        </p>
                                    </a>
                                </div>
                                @endif  
                            </div>                     
                        </div>
                        <div style="height:15px;">&nbsp;</div>
                        <div class="text-right" style="padding:0;">
                            <?php
                            if($post->photos->count() === 0) {
                                echo '<span><a href="/signin">Recommend a photo</a>&nbsp;&nbsp;|&nbsp;&nbsp;</span>';
                            }
                            ?><a href="/post/{{$post->id}}/#/detail">Details</a>
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