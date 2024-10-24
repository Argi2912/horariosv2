<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">

    <title>Horario</title>

</head>

<body>
   
    <div class="row">
        <div class="col-md-4">
            <img src="img/nuevo.jpg" alt="" height="130px" width="700px">
        </div>
    </div>
    <br>
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Horas</th>
                    @foreach ($horario_profesor as $dia => $materias)
                        <th>{{ $dia }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($horario_profesor as $dia => $materias)
                    @foreach ($materias as $materia)
                        @if (!isset($horas[$materia[1]]))
                            @php
                                $horas[$materia[1]] = true;
                            @endphp
                        @endif
                    @endforeach
                @endforeach

                @foreach ($horas as $hora => $value)
                    @php
                        $hora_formateada = date('H:i', strtotime($hora));
                    @endphp
                    <tr>
                        <td>{{ $hora_formateada }}</td>
                        @foreach ($horario_profesor as $dia => $materias)
                            <td>
                                @foreach ($materias as $materia)
                                    @if ($materia[1] == $hora)
                                        {{ $materia[0] }} (Sección: {{ $materia[2] }}, Aula:
                                        {{ $materia[3] }})<br>
                                    @endif
                                @endforeach
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row justify-content-end">
        <table class="table-bordered">
            <tr>
                <td><strong>Profesor: </strong></td>
                <td>{{ $profesor->Nombre . ' ' . $profesor->Apellido }}</td>
            </tr>
            <tr>
                <td><strong>Telefono: </strong></td>
                <td>{{ $profesor->Telefono }}</td>
            </tr>
            <tr>
                <td><strong>Correo: </strong></td>
                <td>{{ $profesor->Email }}</td>
            </tr>
        </table>

    </div>
</body>

</html>
