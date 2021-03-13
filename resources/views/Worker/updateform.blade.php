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
<div class="container">
        <form action="/updateform/{{$worker->id}}" method="post" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}
            <table class="table">
                <tr>
                    <th class="text-center">Form</th>
                </tr>

                <tr>
                <input type="hidden" name="id" value="{{$worker->id}}">
                    <td>Name</td>
                    <td>
                        <input type="text" name="name" value="{{$worker->Name}}" id="" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="email" value="{{$worker->Email}}" id="" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Image</td>
                    <td>
                        <input type="file" name="image" id="" value="{{$worker->Image}}" class="form-control">
                        <img src="{{asset('Visa/'.$worker->Image)}}" width="110px" height="120px;">
                    </td>
                </tr>

                <tr>                    
                    <td colspan="2">
                        <input type="submit" value="Update" class="btn btn-danger">
                    </td>
                </tr>

            </table>
        </form>
    </div>
@endsection
</body>
</html>