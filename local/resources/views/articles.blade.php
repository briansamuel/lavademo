<!DOCTYPE html>
<html>
<head>
	<title>View articles</title>
</head>
<body>
	<ul>
	@foreach($articles as $article)
		<li>Name : {{$article->name}} | Author : {{$article->author}}</li>
	@endforeach
	</ul>
</body>
</html>