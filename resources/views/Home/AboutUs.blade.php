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
    <h1>This is About us Page</h1>

    <h3>Your Designation is {{$Designation}} </h3>
    @endsection
</body>
</html>