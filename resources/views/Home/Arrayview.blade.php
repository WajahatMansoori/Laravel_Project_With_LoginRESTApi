<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>This is array page</h1>
{{--
  
    @foreach($Students as $Item)
    <h2> {{$Item}}</h2>
    @endforeach
--}}

{{--
@for($i=0;$i<=3;$i++)
 <h2> {{$i}} </h2>
 @endfor
 
 --}}

@php $i=0 @endphp
@while($i<=5)
<h2> {{$i}} </h2>
@php $i++ @endphp
@endwhile

</body>
</html>