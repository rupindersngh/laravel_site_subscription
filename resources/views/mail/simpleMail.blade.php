<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>{{ $data['greetings'] }},</p>
	<br>
	@if(isset($data['hasParagraphs']))
		@foreach($data['paragraphs'] as $p)
			<p>{{ $p }}</p>
		@endforeach
		<br>
	@else
		<p>{{ $data['msg'] }}</p>
		<br>
	@endif
	<p>{{ $data['mClosing'] }}</p>
</body>
</html>