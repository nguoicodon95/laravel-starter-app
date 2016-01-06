<!DOCTYPE html>
<html ng-app="stream" lang="en">
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
    <link href="/assets/css/libs.css" rel="stylesheet" />
    <link href="/assets/css/app.css" rel="stylesheet" />
    <link href="/assets/css/addons.css" rel="stylesheet" />
  </head>
  <body ng-controller="mainCtrl">
    @if (Auth::check())
      <?php
        $isAdmin = "";
        if(Auth::user()->is_admin === 1) {
          $isAdmin = "isadmin=\"true\""; 
        }
      ?>
      <auth valid="true" identity="<?php echo Auth::id(); ?>" <?php echo $isAdmin; ?>></auth>
    @endif
    <!-- Facebook SDK -->
    <div id="fb-root"></div>
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
          <form action="/search/" method="post" class="navbar-form navbar-left" role="search">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <div class="form-group">
              <input type="text" name="query" class="form-control search-box" placeholder="Posts or photos">
            </div>
            <button type="submit" class="form-control btn btn-default">Search</button>
            &nbsp;
            <button type="button" class="btn btn-primary" ui-sref="discover" ng-click="go('/discover')">Discover</button>
          </form>
          <ul class="nav navbar-nav navbar-right"> 
            @if (!Auth::check())
            <li class="hidden-xs hidden-sm"><a href="/page/pricing">Pricing</a></li>
            <li class="hidden-xs hidden-sm"><a href="/page/funding">Funding</a></li>
            @endif
            @if (!Auth::check())
            <li><a href="/signin" class="signin link">Sign in</a></li>
            @else
            <li><a href="/logout" class="signout link">Sign out</a></li>
            <?php 
              if(Auth::check()) {
                if(Auth::user()->is_admin === 1) {
                  echo "<li><a style=\"padding-left:0\">|</a></li>";
                  echo "<li><a href=\"/user/\" style=\"padding-left:0\">Manage users</a></li>";
                }
              }    
            ?>   
            <li><button type="button" style="margin-top:8px" class="btn btn-primary post button" ui-sref="add" ng-click="go('/add')">Post</button></li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    <!-- main container -->
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
    <!-- available and upcoming features -->
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
                        Sign in/out
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
                        Create streams
                      </li>
                      <li>
                        <span class="glyphicon glyphicon-ok-sign text-primary" aria-hidden="true"></span>
                        Add posts
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
    <!-- overlay -->
    <div class="stream overlay">
      <div class="overlay-wrapper" ui-view="OverlayView"></div>
    </div>
    <script src="/assets/js/libs.js"></script>
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/route.js"></script>
    <script src="/assets/js/addons.js"></script>
    <script>angular.module("stream").constant("CSRF_TOKEN", '{{ csrf_token() }}');</script>
  </body>
</html>