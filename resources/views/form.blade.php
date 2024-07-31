<x-bootstrap></x-bootstrap>

<head>
    <title>Register</title>
    <x-head></x-head>
    <style>
        .vh-200 {
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
    </style>
</head>

<body>
    <section class="vh-200">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card text-center align-items-center">
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <h2 class="fw-bold mb-5">Sign up now</h2>
                                <form method="post" action="{{ url('/register') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="form3Example1" class="form-control" name="name" required />
                                                <label class="form-label" for="form3Example1">First name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="form3Example2" class="form-control" name="lastname" required />
                                                <label class="form-label" for="form3Example2">Last name</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="form3Example3" class="form-control" name="email" required />
                                        <label class="form-label" for="form3Example3">Email address</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4" class="form-control" name="password" required />
                                        <label class="form-label" for="form3Example4">Password</label>
                                    </div>

                                    <button type="submit" class="btn btn-custom btn-lg btn-block">
                                        Sign up
                                    </button>
                                    <button type="button" onclick="location.href='{{ url('/') }}'" class="btn btn-custom btn-lg btn-block">
                                        Back
                                    </button>
                                </form>

                                <h2 class="titulo">{{ session('status') }}</h2>
                            </div>
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
