<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form trong Laravel 5</title>
</head>
<body>
	<h1>Đây là trang show : {!! $article->id !!}</h1>
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<input type="text" name="name" value="{!! $article->name !!}" placeholder="Tên bài viết">
	<input type="text" name="author" value="{!! $article->author !!}" placeholder="Tên tác giả">
</body>
</html>