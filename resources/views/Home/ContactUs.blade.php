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
    <h1 class="text-center bg-danger text-white">This is Contactus Page</h1>
    <h3>Name is {{$Name}} Designation is {{$Des}} Salary is {{$Sal}} </h3>

    @if($Sal>=40000)
    <h3>Your is Grater than 40 Thousand and total Salary is {{$Sal}} </h3>
@else
<h3>Your Salary is less than 40 Thousand</h3>
@endif
@endsection
</body>
</html>