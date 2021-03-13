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
    <form action=" {{url('/data')}} " method="post">
    @csrf
        <table class="table">
            <tr>
                <th colspan="2" class="text-center bg-danger text-white" style="font-size:35px;">Registration Form</th>
            </tr>

            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="name" id="" class="form-control">
                </td>
            </tr>

            <tr>
                <td>Email</td>
                <td>
                    <input type="text" name="email" id="" class="form-control">
                </td>
            </tr>

            <tr>
                <td>Age</td>
                <td>
                    <input type="number" name="age" id="" class="form-control">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" value="Submit" class="btn btn-outline-danger">                
                </td>
            </tr>

        </table>
    </form>

    @endsection
</body>
</html>