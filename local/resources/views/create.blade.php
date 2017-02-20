<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form trong Laravel 5</title>
</head>
<body>
	<h1>Them Bai Viet Moi</h1>
	<form method="POST" action="{{ url('admin/addarticles') }}">
		<input type="hidden" name="_token" value="{!! csrf_token() !!}">
		<input type="text" name="name" placeholder="Tên bài viết">
		<input type="text" name="author" placeholder="Tên tác giả">
		<input type="submit" value="Thêm mới">
	</form>
</body>
</html>