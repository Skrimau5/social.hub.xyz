<x-bootstrap></x-bootstrap>

<head>
    <title>Registro</title>
    <x-head></x-head>
    <style>
        .vh-100 {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
            max-width: 600px;
            width: 100%;
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

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="fw-bold mb-4 text-center">Regístrate ahora</h2>
                            <form method="post" action="{{ url('/register') }}">
                                @csrf

                                <div class="form-outline mb-4">
                                    <input type="text" id="form3Example1" class="form-control form-control-lg" name="name" required />
                                    <label class="form-label" for="form3Example1">Nombre</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" id="form3Example2" class="form-control form-control-lg" name="lastname" required />
                                    <label class="form-label" for="form3Example2">Apellido</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="email" id="form3Example3" class="form-control form-control-lg" name="email" required />
                                    <label class="form-label" for="form3Example3">Correo electrónico</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="form3Example4" class="form-control form-control-lg" name="password" required />
                                    <label class="form-label" for="form3Example4">Contraseña</label>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-custom btn-lg btn-block mb-2">Registrarse</button>
                                    <button type="button" onclick="location.href='{{ url('/') }}'" class="btn btn-secondary btn-lg btn-block">Volver</button>
                                </div>

                                <div class="text-center mt-3">
                                    <h2 class="titulo">{{ session('status') }}</h2>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<footer>
    <x-footer></x-footer>
</footer>
