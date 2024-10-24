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
        <div class="col-md-6">
            <div class="form-group">
                <img src="img/Logo_Uptjaa.svg" alt="" height="130px" width="200px">
            </div>
        </div>
        {{-- <div class="col-md-6">
            <div class="form-group">
                <p><b>Profesor:</b {{ $profesor->Nombre }}></p>
                <p><b>Materias:
                        @foreach ($creditos as $credito)
                    </b {{ $credito->credito->Nombre_UC }}>
                    @endforeach
                </p>
            </div>
        </div> --}}
    </div>
    <br><br>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <th>Horas</th>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miercoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                </thead>
                <tbody>
                    <tr>
                        <td>08:00 - 08:45</td>
                        <td>PROYECTO NACIONAL Y NUEVA CIUDADANIA</td>
                        <td></td>
                        <td></td>
                        <td>IDIOMAS I</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>08:45 - 09:30</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>09:30 - 10:15</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>10:15 - 11:00</td>
                        <td>PROYECTO</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>11:00 - 11:45</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>PROYECTO NACIONAL Y NUEVA CIUDADANIA</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>11:45 - 12:30</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>12:30 - 01:15</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>01:15 - 02:00</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>02:00 - 02:45</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>02:45 - 03:30</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>03:30 - 04:15</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>04:15 - 05:00</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



</body>

</html>
