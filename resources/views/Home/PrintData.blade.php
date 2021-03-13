<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts/master')

@section('Content')
@foreach($FormData as $item)
<h3> {{ $item}} </h3>
@endforeach

<h4>Name: {{$FormData['name']}}</h4>
<h4>Email: {{$FormData['email']}}</h4>
<h4>Age: {{$FormData['age']}}</h4>
@endsection
</body>
</html>