<!DOCTYPE html>
<html lang="pt-BR">
<head>
    @include('home.css')
</head>
<body>
    @include('home.header')

    @if(count($cart) > 0)
    @foreach($cart as $item)
        <p>{{ $item['room_title'] }} - {{ $item['start_date'] }} até {{ $item['end_date'] }}</p>
    @endforeach
@else
    <p>Carrinho vazio</p>
@endif

</body>
</html>
