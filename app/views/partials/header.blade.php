<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Base product - stream</title>
<?php $baseURL = "http://".$_SERVER['SERVER_NAME']; ?>
@foreach($post as $key => $value)
<meta property="og:title" content="{{$value->title}}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{$baseURL}}/detail/{{$value->id}}">
<meta property="og:description" content="{{$value->post}}">
@if($value->file->count() > 0)      
<meta property="og:image" content="{{$baseURL}}/{{$value->file[0]->file_thmb_url}}">    
@endif
@endforeach
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="300">
<meta property="og:image:height" content="300">
<link href="/css/styles.css" rel="stylesheet" />