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
        <form action="{{route('addimage')}}" method="post" enctype="multipart/form-data">
            @csrf
            <table class="table">
                <tr>
                    <th class="text-center">Form</th>
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
                        <input type="email" name="email" id="" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Image</td>
                    <td>
                        <input type="file" name="image" id="" class="form-control">
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
    @endsection
</body>
</html>