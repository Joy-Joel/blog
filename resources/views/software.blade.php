<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>This is shows software page</title>
</head>
<body>
    @foreach($names as $key=>$value)
       <p> {{$key}} {{$value}} <p>
    @endforeach
</body>
</html>