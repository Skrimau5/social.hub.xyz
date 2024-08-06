<x-bootstrap></x-bootstrap>

<head>
    <title>Configuración de Google Authenticator</title>
    <x-head></x-head>

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
            padding: 15px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background: #ffffff;
        }

        .card-heading {
            color: #343a40;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .card-body {
            text-align: center;
            padding: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .footer {
            margin-top: 50px;
            text-align: center;
            padding: 20px;
            background-color: #343a40;
            color: #ffffff;
        }
    </style>
</head>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card card-default">
                <h4 class="card-heading">Configura Google Authenticator</h4>

                <div class="card-body">
                    <p>¡Gracias por registrarte en Social Hub!</p>

                    <p>Tu código secreto de Google 2FA es: <strong>{{ $secret }}</strong></p>

                    <p>Mantén este código en un lugar seguro y no lo compartas con nadie.</p>

                    <a href="{{ url('/') }}" class="btn btn-primary">Completar Registro</a>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <x-footer></x-footer>
</footer>
