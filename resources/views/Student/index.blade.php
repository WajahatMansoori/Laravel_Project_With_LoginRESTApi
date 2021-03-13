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
        <div class="col-md-12 row">
        <a href="{{ action('StudentController@create') }}" class="btn btn-outline-danger">Create</a>
            <table class="table">
                <tr>
                    <th  colspan="4" class="bg-danger text-white text-center">Student Records</th>
                </tr>

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                </tr>

                @foreach($std as $data)
                <tr>
                    <td> {{$data['id']}} </td>
                    <td> {{$data['Name']}} </td>
                    <td> {{$data['Email']}} </td>
                    <td> {{$data['Age']}} </td>
                </tr>
                @endforeach
            </table>

          
        </div>
    </div>
    {{ $std->links()}}
    @endsection
</body>
</html>