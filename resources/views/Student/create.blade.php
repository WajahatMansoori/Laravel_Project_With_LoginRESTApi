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
    <div class="row">
    <div class="col-md-10 offset-1">
        <form action="{{ action('StudentController@store') }}" method="post">
            @csrf
            <table class="table">
                <tr>
                    <th class="text-center">Form</th>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="name" id="" class="form-control">
                        @error('name')
                        <span class="text-danger">{{"*".$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="email" id="" class="form-control">
                        @error('email')
                        <span class="text-danger">{{"*".$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <td>Age</td>
                    <td>
                        <input type="number" name="age" id="" class="form-control">
                        @error('age')
                        <span class="text-danger">{{"*".$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" value="Submit" class="btn btn-danger">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    </div>
</div>

@endsection
</body>
</html>