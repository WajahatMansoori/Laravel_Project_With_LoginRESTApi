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
<a href="/worker">Add record</a>
    <table class="table">
        <tr>
            <th colspan="7" class="text-center">Records</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Created</th>
            <th colspan="2">Action</th>
        </tr>
@if($worker)
        @foreach($worker as $record)
        <tr>
            <td> {{$record->id}} </td>
            <td> {{$record->Name}} </td>
            <td> {{$record->Email}} </td>
            <td> <img src="{{asset('Visa/'. $record->Image)}}" width="110px" height="120px;"> </td>
            <td> {{$record->created_at}} </td>
            <td>
            <a href="/editForm/{{$record->id}}" class="btn btn-sm btn-primary">Edit</a>
            <a href="/deleteForm/{{$record->id}}" Onclick="return DeleteConfirm()" class="btn btn-sm btn-danger">Delete</a>
            <a href="/detail/{{$record->id}}" class="btn btn-sm btn-success">Details</a>
            </td>
        </tr>
        @endforeach
        
        @endif
    </table>
</div>
{!! $worker->links() !!}
@endsection

<script>
function DeleteConfirm()
{
    return confirm('Are u sure to delete data');
}
</script>
</body>
</html>