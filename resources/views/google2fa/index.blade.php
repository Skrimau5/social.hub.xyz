<x-bootstrap></x-bootstrap>

<head>
    <title>Configuración de Google Authenticator</title>
    <x-head></x-head>
    <style>
        .vh-70 {
            height: 70vh;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
            max-width: 500px;
            width: 100%;
        }

        .card-header {
            background-color: #ff6219;
            color: #ffffff;
            border-bottom: none;
            border-radius: 1rem 1rem 0 0;
        }

        .card-body {
            padding: 2rem;
        }

        .btn-custom {
            background-color: #ff6219;
            border-color: #ff6219;
            color: white;
        }

        .btn-custom:hover {
            background-color: #ff4500;
            border-color: #ff4500;
        }

        .form-outline label {
            color: #56111C;
        }

        .form-outline input:focus,
        .form-outline input:active {
            border-color: #ff6219;
            box-shadow: 0 0 5px rgba(255, 98, 25, 0.5);
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-70">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                        Configuración de Google Authenticator
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <strong>{{$errors->first()}}</strong>
                            </div>
                        @endif

                        <form method="POST" action="{{ url('/2fa') }}">
                            {{ csrf_field() }}
                            
                            <div class="form-outline mb-4">
                                <p>Por favor, ingresa el <strong>OTP</strong> generado en tu aplicación Authenticator. <br> Asegúrate de enviar el código actual ya que se actualiza cada 30 segundos.</p>
                                <label for="one_time_password">Código de un solo uso</label>
                                <input id="one_time_password" type="number" class="form-control form-control-lg" name="one_time_password" required autofocus>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-custom btn-lg">
                                    Iniciar sesión
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<footer>
    <x-footer></x-footer>
</footer>
