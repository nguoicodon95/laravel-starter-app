<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Puff Stream</title>
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
  </head>
  <body ng-app="streamApp">
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
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control search-box" placeholder="Posts or photos">
            </div>
            <button type="submit" class="btn btn-default">Search</button>
            &nbsp;&nbsp;
            @if (Auth::check())
            <button type="button" class="btn btn-primary stream button">Stream</button>
            @endif
          </form>
          <ul class="nav navbar-nav navbar-right"> 
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
                  <h3 style="margin-bottom:15px">Create new Stream</h3>
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
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/main-min.js"></script>
  </body>
</html>