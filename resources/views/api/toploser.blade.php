<!DOCTYPE html>
<html lang="en">

<head>
    <title>Goapi.id Stocks</title>
</head>

<body>
    <h1>Goapi.id Stocks</h1>
    <ul>
        @foreach ($stocks['data'] as $stock)
            <li>
                <a href="{{ url('api/stock/idx/companies/' . $stock['id']) }}">{{ $stock['name'] }}</a>
            </li>
        @endforeach
    </ul>

</body>

</html>
