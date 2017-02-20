<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form trong Laravel 5</title>
</head>
<body>
	<h1>Ma so bai viet : {!! $article->id !!}</h1>
	<form method="POST" action="{{ url('/articles') }}/{!! $article->id !!}">
		{!! csrf_field() !!}
		{!! method_field('patch') !!}
		
		<input type="text" name="name" value="{!! $article->name !!}" placeholder="Tên bài viết">
		<input type="text" name="author" value="{!! $article->author !!}" placeholder="Tên tác giả">
		<input type="submit" value="Sửa bài">
	</form>
</body>
</html>