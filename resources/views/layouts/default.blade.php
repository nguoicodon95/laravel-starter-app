@include('partials.header')
  <body ng-controller="mainCtrl">
    @if (Auth::check())
      <?php
        $isAdmin = "";
        if(intval(Auth::user()->is_admin) === 1) {
          $isAdmin = "isadmin=\"true\""; 
        }
      ?>
      <auth valid="true" identity="<?php echo Auth::id(); ?>" <?php echo $isAdmin; ?>></auth>
    @endif
    <!-- Facebook SDK -->
    <div id="fb-root"></div>
    <nav class="navbar navbar-inverse" style="margin-bottom:7px;background:white;border:0;border-bottom:#ddd 1px solid">
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
          {!! Form::open(array('url' => 'search', 'class' => 'navbar-form navbar-left')) !!}
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <div class="form-group">
              <input type="text" name="query" class="form-control search-box" placeholder="Posts or photos">
            </div>
            <button type="submit" class="form-control btn btn-default">Search</button>
            &nbsp;
            <button type="button" class="btn btn-primary" ui-sref="discover" ng-click="go('/discover')">Discover</button>
          {!! Form::close() !!}
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
                if(intval(Auth::user()->is_admin) === 1) {
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
    <div layout="row" layout-align="center start" style="background:#F3F3F3">
      <div layout="row" flex class="layout-max-width">
        <div flex>@yield('center')</div>
        <div flex="40">
          @yield('left')
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