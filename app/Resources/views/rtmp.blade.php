<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Трансляция</title>

    <link href="http://vjs.zencdn.net/4.11/video-js.css" rel="stylesheet">
    <script src="http://vjs.zencdn.net/4.11/video.js"></script>
    <style>
        html,body{
            width: 100%;
            height: 100%;
            overflow: hidden;
            margin:0;
            padding: 0;
        }
    </style>
</head>
<body>
<video width="100%" height="100%" id="my_video_1" class="video-js vjs-default-skin" controls preload="auto"
       data-setup='{}'>
    <source src="rtmp://localhost/live/{{ $key }}" type='rtmp/flv'>
</video>

<script>
</script>

<script src="http://static.jsbin.com/js/render/edit.js?4.0.2"></script>


</body>
</html>