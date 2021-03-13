<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Blade Form</h1>
    {{Form::open(['url'=>'/FormData','method'=>'post'])}}
    {{Form::label('Name: ')}}
    {{Form::text('name')}}
    <br><br>
    {{Form::label('Age: ')}}
    {{Form::number('age')}}
    <br><br>
    {{Form::label('Password: ')}}
    {{Form::password('password')}}
    <br><br>
    {{Form::submit('Submit')}}
    
    {{Form::close()}}
    
    

</body>
</html>