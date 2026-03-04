<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
<form method="POST" action="{{route('pay')}}">
    @csrf
    <input type="number" name="cost" placeholder="Cost in RS">
    <button type="submit"> Pay via Khalti</button>
</form>
</body>
</html>
