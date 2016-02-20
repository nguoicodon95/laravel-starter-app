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
	<div class="panel panel-default">
	  <div class="panel-body">
	    <div style="padding:10px;">
			
			<div ui-view="DetailView"></div>
			<div ui-view="RedirectView" ng-hide="redirect.detail===true"></div>
	    
		    <!-- Laravel 5 posts -->
		    <!-- post preloader -->
	    	<div ng-show="page.loaded===false">
				@foreach($post as $item)
					@foreach($item->tags as $tag)
						<!-- cache title and body here -->
						<span class="identity-cache" style="display:none">{{$item->user_id}}</span>
						<span class="title-cache" style="display:none">{{$item->title}}</span>
						<span class="body-cache" style="display:none">{{$item->body}}</span>
						<span class="photos-cache" style="display:none">{{$item->photos}}</span>
				        <h4 style="font-size:32px;line-height:1.2;padding-bottom:10px;margin-bottom:15px;border-bottom:1px solid #eaeaea">
				            <a href="/tag/{{$tag->id}}#/list"><span style="background:rgb(238, 238, 238);margin-right:5px;display:inline-block;border-radius:5px;padding:5px;color:#474747">{{$tag->name}}</span></a>
				            <span style="background:rgb(238, 238, 238);margin-right:5px;display:inline-block;border-radius:5px;padding:5px;color:#474747">{{$item->author->author_prefix}}</span>
				            {{$item->title}}
				        </h4>
						
						@foreach($item->photos as $index=>$photos)
							@if($index === 0)
								<div class="feature-image details" style="background-image: url('{{$photos->url}}');"></div>
					        @endif
				        @endforeach

						<p style="padding-bottom:40px;font-size:17px;">
				        	{!! nl2br(e($item->body)) !!}
				        </p>
						
						<div class="photo-grid details">
							@if($item->photos->count() > 1)
							<div class="row first-row">
								@foreach($item->photos as $index=>$photos)
									@if($index === 1 || $index === 2)
										<?php $boxClass = ($index === 1) ? 'col box-1' : 'col box-2'; ?>
										<div class="<?php echo $boxClass ?>">
												<div class="image-holder" style="background-image: url('{{$photos->url}}');"></div>
											<div class="text-box">
												<p>Use Gimp asdfdsafadsf asdf sdf dsfsdf dfsfdsf</p>  
											</div>
										</div>
									@endif
								@endforeach
							</div> 
							@endif
							@if($item->photos->count() > 3)
							<div class="row second-row">
								@foreach($item->photos as $index=>$photos)
									@if($index === 3)
										<div class="col box-3">
											<div class="image-holder" style="background-image: url('{{$photos->url}}');"></div>
										</div>
										<div class="col box-4">
											<div class="text-box">
												<p>Use Gimp asdfdsafadsf asdf sdf dsfsdf dfsfdsf</p>  
											</div>
										</div>
									@endif
								@endforeach
							</div>
							@endif
						</div>
				        @if (Auth::check())
						<div class="row">
							<div class="col-xs-12 text-right">
								@if(intval(Auth::user()->is_admin) === 1)
								<button type="button" class="btn btn-danger" ng-show="auth===true" ui-sref="edit">Suspend Post</button>
								@endif
								@if (Auth::id() === $item->user_id)
								<button type="button" class="btn btn-primary" ng-show="auth===true" ui-sref="edit" ng-click="go('edit')">Edit Post</button>
								@endif
							</div>
						</div>
						@endif
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