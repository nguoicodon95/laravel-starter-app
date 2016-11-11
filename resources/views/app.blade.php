<!doctype html>
<html>
    <head>
        <title>Stream</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="/css/app.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <!--
                    <h1>New message</h1>
                    <select class="form-control">
                        <option>Select</option>
                        <option>Color</option>
                        <option>Post</option>
                    </select>
                    <h1>Color</h1>
                    <input type="text" class="form-control" placeholder="Color name" />
                    <br />
                    <input type="text" class="form-control" placeholder="#" />
                    <br />
                    <input type="button" class="btn btn-primary" value="Publish" />
                    -->
                    <h1>Post</h1>
                    <textarea class="form-control"></textarea>
                    <br />
                    <input type="button" class="btn btn-primary" value="Publish" />
                    <br />
                    <br />
                    <?php
                        $arr = json_decode($message, true);
                        print_r($arr);
                        echo '<br/><br/>';
                        foreach($arr as $i => $v) {
                            echo $v['scene'].'<br/>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
