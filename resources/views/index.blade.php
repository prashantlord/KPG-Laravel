@props(['message' => null])
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Index</title>
</head>
<body>
@if ($message)
    <h1>{{$message}} </h1>
@endif

</body>
</html>
