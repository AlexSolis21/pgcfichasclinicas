<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   
    <link href="{{ public_path('assets/css/material-dashboard.css?v=3.0.0') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <script src="{{ public_path('assets/js/core/bootstrap.min.js')}}"></script>
    <p class="text-center">Nombre {{$patient->nombres }}</p>
    <p class="text-left">Médico: {{ $patient->expedient->medic->nombre ?? '' }} </p>
</body>
</html>