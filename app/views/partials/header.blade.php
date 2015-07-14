<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Stream - base product</title>
<?php $baseURL = "http://".$_SERVER['SERVER_NAME']; $count = 0; ?>
@foreach($post as $key => $value)
@if($count === 0)
<meta property="og:title" content="{{$value->title}}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{$baseURL}}/detail/{{$value->id}}">
<?php $p = new PostHelper(); $desc = $p->description($value->post); ?>
<meta property="og:description" content="{{ $desc }}">
@if($value->file->count() > 0)
<meta property="og:image" content="{{$baseURL}}/{{$value->file[0]->file_thmb_url}}">    
@endif
<?php $count += 1; ?>
@endif
@endforeach
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="300">
<meta property="og:image:height" content="300">
<link href="/css/styles.css" rel="stylesheet" />