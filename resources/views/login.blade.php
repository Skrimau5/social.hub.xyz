<x-bootstrap></x-bootstrap>

<head>
    <title>Social Hub</title>
    <x-head></x-head>
    <style>
        .vh-100 {
            height: 100vh;
            background-color: #56C;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #ffffff;
            max-width: 400px;
            width: 100%;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
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

        .titulo {
            color: #dc3545;
            text-align: center;
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card text-center align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <form method="POST" action="{{ url('/login') }}" role="form">
                                @csrf
                                <div class="d-flex align-items-center mb-4">
                                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                    <h1 class="fw-bold mb-0">Social Hub Manager</h1>
                                </div>
                                <h5 class="fw-normal mb-4 pb-2" style="letter-spacing: 1px;">Inicia sesión en tu cuenta</h5>
                                <div class="form-outline mb-4">
                                    <input type="email" name="email" id="form2Example17" class="form-control form-control-lg" required />
                                    <label for="form2Example17">Correo electrónico</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" required />
                                    <label for="form2Example27">Contraseña</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="text" name="google2fa_secret" id="form2Example28" class="form-control form-control-lg" required />
                                    <label for="form2Example28">Código OTP</label>
                                </div>
                                <div class="pt-1 mb-4">
                                    <button type="submit" class="btn btn-custom btn-lg btn-block">Iniciar sesión</button>
                                </div>
                                <h2 class="titulo">{{ session('status') }}</h2>
                                <p class="mb-5 pb-lg-2" style="color: #393f81;">
                                    ¿Nuevo en Social Hub? 
                                    <a href="{{ url('/register') }}" style="color: #393f81;">Regístrate aquí</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>


