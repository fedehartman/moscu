<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{$titulo}}</h2>

		<div>
			{{$texto}}
		</div>

		<div>
			@foreach($tweets as $tweet)
				{{ $tweet }}
      @endforeach
		</div>
	</body>
</html>