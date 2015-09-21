<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Puff Stream</title>
    <link href="/assets/css/styles.css" rel="stylesheet" />
  </head>
  <body>
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
              <input type="text" class="form-control search-box" placeholder="Posts or photos" disabled>
            </div>
            <button type="submit" class="btn btn-default" disabled>Search</button>
            &nbsp;&nbsp;
            <button type="button" class="btn btn-primary new-stream-button" disabled>New Stream</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a>Sign in</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- desktop container -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                @yield('center')
            </div>    
        </div>
    </div>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/main-min.js"></script>
  </body>
</html>