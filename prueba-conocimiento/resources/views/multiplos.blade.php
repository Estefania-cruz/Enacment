<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Múltiplos App</title>
</head>
<body>
    <form action="{{ route('calcular.multiplos') }}" method="post">
        @csrf
        <label for="numero">Ingrese un número:</label>
        <input type="number" name="numero" required>
        <button type="submit">Calcular Múltiplos</button>
    </form>

    @isset($resultados)
        <h2>Resultados para el número {{ $numero }}:</h2>
        <ul>
            @foreach ($resultados as $resultado)
                <li>
                    {{ $resultado['numero'] }}
                    @foreach ($resultado['multiplos'] as $multiplo)
                        <span style="color: {{ $multiplo['color'] }};">{{ $multiplo['valor'] }}</span>
                    @endforeach
                </li>
            @endforeach
        </ul>
    @endisset
</body>
</html>
