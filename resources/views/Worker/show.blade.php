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
@if($worker)
<div class="container">
<table class="table">
    <tr>
        <th colspan="4" class="text-center" style="font-size:25px;">Records</th>
    </tr>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Image</th>
    </tr>
    
    <tr>
        <td> {{$worker->id}} </td>
        <td> {{$worker->Name}} </td>
        <td> {{$worker->Email}} </td>
        <td> <img src="{{asset('Visa/'. $worker->Image)}}" width="110px" height="100px" alt=""> </td>
    </tr>
</table>
</div>
@endif

@endsection
</body>
</html>