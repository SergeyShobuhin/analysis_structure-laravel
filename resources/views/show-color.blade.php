<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

</head>
<body>
@if(array_key_exists($color, $colorsArray))
    <h2>{{$colorsArray[$color]}}</h2>
@else
    <h3 style="color: red"> NET EGO</h3>
@endif
<hr>
<table border="2">
    @foreach($colorsArray as $item)
        <tr>
            <td>{{$item}}</td>
        </tr>
    @endforeach
</table>
</body>

</html>
