<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials.header')
  </head>
  <body>
    <div class="container-fluid update-grid">
      <div class="row no-margin">
        <!-- #1 column -->
        <div class="col-xs-12 col-sm-7 col-md-9">
            <div class="row header-wrap">
                <div class="col-xs-12 inner-header-wrap">
                    <div class="header">
                        @yield('title')
                    </div>
                </div>
            </div>
            <div class="row content-wrap">   
                @yield('list')
                @yield('detail')
                @yield('edit')
            </div>
        </div>
        <!-- #2 column -->
        <div class="col-xs-12 col-sm-5 col-md-3 side-wrap">
            <!-- #1 row -->
            <div class="row">
                <div class="col-xs-12 inner-side-wrap">
                    <div class="side-nav">
                        @include('auth.logoutLink')
                        @include('auth.loginMessages')
                        @include('auth.loginForm')
                        @include('sections.addPost')
                        <!-- Pagination to go here -->
                        <?php
                        $count = 0;
                        foreach($post as $key => $value) {
                            $count++;
                        }

                        if($count > 1) {
                            echo $post->links();
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- #2 row -->
            @include('auth.updateDetails')
        </div>
      </div>
    </div>
    <script src="/js/main.js"></script>
  </body>
</html>