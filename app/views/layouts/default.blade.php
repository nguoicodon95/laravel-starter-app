<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Puff Stream</title>
    <meta property="og:url"           content="http://www.puffstream.com/stream" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Puff Stream" />
    <meta property="og:description"   content="With Stream you can write something, then watch the web come to you." />
    <meta property="og:image"         content="http://i.dailymail.co.uk/i/pix/2013/10/02/article-2441512-02650200000005DC-411_634x380.jpg" />
    <link href="/assets/css/styles.css" rel="stylesheet" />
    <script src="/assets/js/angular.min.js"></script>
    <script>
      // declare a module
      var streamApp = angular.module('streamApp', []);
      streamApp.config(function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
      });
    </script>
    <style>
    @media screen and (max-width: 767px) {
      .navbar-form.navbar-left {
        margin-top:0;
        margin-bottom:0;
        line-height:0;
      }
    }
    </style>
  </head>
  <body ng-app="streamApp">

    <!-- Facebook SDK -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <!-- End of Facebook SDK -->

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Puff Stream</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="box-shadow:none;border:0">
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control search-box" placeholder="Posts or photos">
            </div>
            <button type="submit" class="form-control btn btn-default">Search</button>
            &nbsp;&nbsp;
            @if (Auth::check())
            <button type="button" class="btn btn-primary stream button">Stream</button>
            @endif
          </form>
          <ul class="nav navbar-nav navbar-right"> 
            <li class="hidden-xs hidden-sm"><a href="/page/pricing">Pricing</a></li>
            <li class="hidden-xs hidden-sm"><a href="/page/funding">Funding</a></li>
            @if (!Auth::check())
            <li><a href="#" class="signin link">Sign in</a></li>
            @else
            <li><a href="/logout" class="signout link">Sign out</a></li>
            <li><button type="button" style="margin-top:8px" class="btn btn-primary post button">Post</button></li>
            @endif 
          </ul>
        </div>
      </div>
    </nav>
    <!-- desktop container -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 hidden-xs hidden-sm">
                @yield('left')
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                @yield('center')
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3">
                @yield('right')
            </div>      
        </div>
    </div>
    <!-- modals -->
    <!-- sign in modal -->
    <div class="modal fade signin-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-xs-12">
                  <h3 style="margin-bottom:15px">Sign in</h3>
                  {{ Form::open(array('url' => 'login')) }}
                    <div class="form-group">
                      {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) }}
                    </div>
                    <div class="form-group">
                      {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
                    </div>
                    <div class="form-group text-right">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      {{ Form::submit('Sign in', ['class' => 'btn btn-primary']) }}
                    </div>
                  {{ Form::close() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- new stream modal -->
    <div class="modal fade stream-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-xs-12">
                  <h3 style="margin-bottom:15px">Create Stream</h3>
                  {{ Form::open(array('url' => 'stream/newtag')) }}
                      <div class="form-group">
                        {{ Form::text('newtag', null, ['class' => 'form-control', 'placeholder' => 'Add a name']) }}
                      </div>
                      <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                      </div>
                    {{ Form::close() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- new post modal -->
    <div class="modal fade post-modal post-wizard" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content" style="height:420px;">
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-xs-12">
                  {{ Form::open(array('url' => 'posts', 'class' => 'postWizardForm')) }}
                    <!-- Post details -->
                    <div class="post-wizard-1" style="display:none;">
                      <h3 style="margin-bottom:15px">Create Post</h3>
                      <div class="post-form-contents" style="height:265px;margin-bottom:20px">
                        <div class="form-group">
                            <input type="text" name="title" placeholder="Add title" class="form-control" style="width:100%;height:auto;display:inline-block;font-size:17px;" />
                        </div>
                        <div class="form-group">
                          <textarea class="form-control" name="body" placeholder="Write something.." style="height:200px;font-size:17px;"></textarea>
                        </div>
                      </div>
                      <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" data-next="2" class="btn btn-primary next button">Next</button>
                      </div>
                    </div>
                    <!-- Stream details -->
                    <div class="post-wizard-2" style="display:none">
                      <h3 style="margin-bottom:15px">Add to Stream</h3>
                      <div class="post-form-contents" style="height:265px;padding-top:10px;margin-bottom:20px;">
                        <div class="form-group">
                            <input type="text" placeholder="Enter Stream" class="form-control" style="width:100%;height:auto;display:inline-block;font-size:17px;" />
                        </div>
                      </div>
                      <div class="form-group text-right">
                        <button type="button" data-prev="1" class="btn btn-primary prev button">Previous</button>
                        <button type="button" data-next="3" class="btn btn-primary next button">Next</button>
                      </div>
                    </div>
                    <!-- Photo details #1 -->
                    <div class="post-wizard-3" style="display:none">
                      <h3 style="margin-bottom:15px">Select photos</h3>
                      <div class="post-form-contents" style="height:265px;margin-bottom:20px;overflow-x:hidden;overflow-y:scroll">
                        <h4 style="margin-bottom:20px;">Photos found on Flickr</h4>
                        <div style="width:98%">
                          <div class="row" style="margin-bottom:20px;">
                            <div class="col-xs-6 col-sm-4">
                              <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" style="max-width:100%;border: 1px solid #DDD;" />
                            </div>
                            <div class="col-xs-6 col-sm-4">
                              <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" style="max-width:100%;border: 1px solid #DDD;" />
                            </div>
                            <div class="col-xs-6 col-sm-4">
                              <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" style="max-width:100%;border: 1px solid #DDD;" />
                            </div>
                            <div class="col-xs-6 col-sm-4">
                              <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" style="max-width:100%;border: 1px solid #DDD;" />
                            </div>
                            <div class="col-xs-6 col-sm-4">
                              <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" style="max-width:100%;border: 1px solid #DDD;" />
                            </div>
                            <div class="col-xs-6 col-sm-4">
                              <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" style="max-width:100%;border: 1px solid #DDD;" />
                            </div>
                            <div class="col-xs-6 col-sm-4">
                              <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" style="max-width:100%;border: 1px solid #DDD;" />
                            </div>
                            <div class="col-xs-6 col-sm-4">
                              <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" style="max-width:100%;border: 1px solid #DDD;" />
                            </div>
                            <div class="col-xs-6 col-sm-4">
                              <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" style="max-width:100%;border: 1px solid #DDD;" />
                            </div>
                            <div class="col-xs-6 col-sm-4">
                              <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" style="max-width:100%;border: 1px solid #DDD;" />
                            </div>
                            <div class="col-xs-6 col-sm-4">
                              <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" style="max-width:100%;border: 1px solid #DDD;" />
                            </div>
                            <div class="col-xs-6 col-sm-4">
                              <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" style="max-width:100%;border: 1px solid #DDD;" />
                            </div>
                            <div class="col-xs-6 col-sm-4">
                              <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" style="max-width:100%;border: 1px solid #DDD;" />
                            </div>
                            <div class="col-xs-6 col-sm-4">
                              <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" style="max-width:100%;border: 1px solid #DDD;" />
                            </div>
                            <div class="col-xs-6 col-sm-4">
                              <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" style="max-width:100%;border: 1px solid #DDD;" />
                            </div>
                            <div class="col-xs-6 col-sm-4">
                              <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" style="max-width:100%;border: 1px solid #DDD;" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group text-right">
                        <button type="button" class="btn btn-default" style="float:left;">Add photos</button>
                        <button type="button" data-prev="2" class="btn btn-primary prev button">Previous</button>
                        <button type="button" data-next="4" class="btn btn-primary next button">Next</button>
                      </div>
                    </div>
                    <!-- Photo details #2 -->
                    <div class="post-wizard-4" style="display:none">
                      <h3 style="margin-bottom:15px">Preview of selected photos</h3>
                      <div class="post-form-contents" style="height:265px;margin-bottom:20px;overflow-x:hidden;overflow-y:scroll">
                        <div style="width:98%">
                          <div class="row" style="margin-bottom:20px;">
                            <div class="col-xs-11">
                              <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" style="max-width:100%;border: 1px solid #DDD;" />
                            </div>
                          </div>
                           <div class="row" style="margin-bottom:20px;">
                            <div class="col-xs-11">
                              <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" style="max-width:100%;border: 1px solid #DDD;" />
                            </div>
                          </div>
                          <div class="row" style="margin-bottom:20px;">
                            <div class="col-xs-11">
                              <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" style="max-width:100%;border: 1px solid #DDD;" />
                            </div>
                          </div>
                          <div class="row" style="margin-bottom:20px;">
                            <div class="col-xs-11">
                              <img src="http://wallpapershdfine.com/wp-content/gallery/images-of-sports-car/ferrari-california-sports-car-2.jpg" style="max-width:100%;border: 1px solid #DDD;" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group text-right">
                        <button type="button" data-prev="3" class="btn btn-primary prev button">Previous</button>
                        <button type="button" data-next="5" class="btn btn-primary next button">Next</button>
                      </div>
                    </div>
                    <!-- Publish -->
                    <div class="post-wizard-5" style="display:none">
                      <h3 style="margin-bottom:15px">&nbsp;</h3>
                      <div class="post-form-contents" style="height:265px;padding-top:10px;margin-bottom:20px;">
                        <h3>Ready to publish your post: <span class="text-primary">xx</span> on <span class="text-primary">xx</span> stream, with a total of <span class="text-primary">xx</span> words and <span class="text-primary">xx</span> images.</h3>
                      </div>
                      <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" data-prev="4" class="btn btn-primary prev button">Previous</button>
                        <button type="button" class="btn btn-primary">Publish</button>
                      </div>
                    </div>
                    {{ Form::close() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- new stream modal -->
    <div class="modal fade features-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-xs-12">
                  <div style="width:100%;height:300px;overflow:auto">
                    <h3 style="margin-bottom:15px">Available and upcoming features</h3>
                    <h4>Membership</h4>
                    <ul>
                      <li>
                        <span class="glyphicon glyphicon-ok-sign text-primary" aria-hidden="true"></span>
                        Sign in and out
                      </li>
                      <li>
                        <span class="glyphicon glyphicon-ok-sign" style="color:#acacac" aria-hidden="true"></span>
                        Register form
                      </li>
                    </ul>
                    <h4>Administration</h4>
                    <ul>
                      <li>
                        <span class="glyphicon glyphicon-ok-sign" style="color:#acacac" aria-hidden="true"></span>
                        Manage members
                      </li>
                    </ul> 
                    <h4>Streams and posts</h4>
                    <ul>
                      <li>
                        <span class="glyphicon glyphicon-ok-sign text-primary" aria-hidden="true"></span>
                        Create a new Stream
                      </li>
                      <li>
                        <span class="glyphicon glyphicon-ok-sign text-primary" aria-hidden="true"></span>
                        Add posts
                      </li> 
                      <li>
                        <span class="glyphicon glyphicon-ok-sign" style="color:#acacac" aria-hidden="true"></span>
                        Add photos
                      </li>
                      <li>
                        <span class="glyphicon glyphicon-ok-sign" style="color:#acacac" aria-hidden="true"></span>
                        Additional options
                      </li>
                    </ul>
                     <h4>Photos, videos and tags</h4>
                    <ul>
                      <li>
                        <span class="glyphicon glyphicon-ok-sign" style="color:#acacac" aria-hidden="true"></span>
                        Add photos
                      </li>
                      <li>
                        <span class="glyphicon glyphicon-ok-sign" style="color:#acacac" aria-hidden="true"></span>
                        Add videos
                      </li> 
                      <li>
                        <span class="glyphicon glyphicon-ok-sign" style="color:#acacac" aria-hidden="true"></span>
                        Add tags
                      </li>
                      <li>
                        <span class="glyphicon glyphicon-ok-sign" style="color:#acacac" aria-hidden="true"></span>
                        Additional options
                      </li>
                    </ul>                   
                    <h4>Responsive Design</h4>
                    <ul>
                      <li>
                        <span class="glyphicon glyphicon-ok-sign text-primary" aria-hidden="true"></span>
                        Layout
                      </li>
                      <li>
                        <span class="glyphicon glyphicon-ok-sign" style="color:#acacac" aria-hidden="true"></span>
                        Photos
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-xs-12 text-right">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/main-min.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-68768008-1', 'auto');
      ga('send', 'pageview');
    </script>
  </body>
</html>