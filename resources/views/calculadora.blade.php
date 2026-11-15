<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora - Laravel 12</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .contenedor {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 350px;
        }
        h2 {
            margin-top: 0;
            color: #1f2937;
            text-align: center;
        }
        label {
            font-weight: 600;
            color: #374151;
            display: block;
            margin-bottom: 5px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #ef4444; 
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #dc2626;
        }
        .resultado-box {
            margin-top: 20px;
            padding: 12px;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            text-align: center;
        }
        .resultado-box h3 {
            margin: 0;
            color: #1e293b;
            font-size: 18px;
        }
    </style>
</head>
<body>

    <div class="contenedor">
        <h2>Calculadora - Laravel 12</h2>

        <form action="{{ route('calculadora.calcular') }}" method="POST">
            @csrf

            <div>
                <label for="valor1">Primer número:</label>
                <input type="number" id="valor1" name="valor1" step="any" value="{{ old('valor1') }}" required>
                @error('valor1')
                    <div style="color: red; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <br>

            <div>
                <label for="valor2">Segundo número:</label>
                <input type="number" id="valor2" name="valor2" step="any" value="{{ old('valor2') }}" required>
                @error('valor2')
                    <div style="color: red; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <br>

            <div>
                <label for="operacion">Operación:</label>
                <select id="operacion" name="operacion" required>
                    <option value="">Seleccione...</option>
                    <option value="sumar" @selected(old('operacion') === 'sumar')>Sumar</option>
                    <option value="restar" @selected(old('operacion') === 'restar')>Restar</option>
                    <option value="multiplicar" @selected(old('operacion') === 'multiplicar')>Multiplicar</option>
                    <option value="dividir" @selected(old('operacion') === 'dividir')>Dividir</option>
                </select>
                @error('operacion')
                    <div style="color: red; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Calcular</button>
        </form>
        @isset($resultado)
            <div class="resultado-box">
                <h3>Resultado: {{ $resultado }}</h3>
            </div>
        @endisset
    </div>

</body>
</html>