<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PKL Telkomsel</title>
    <link rel="icon" href="/img/logo-tsel.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <style>
        body {
            background-image: url('/img/bloom-bg.jpg');
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
    <!-- MDB Script-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
</head>

<body>
    <section class="vh-100" style="background-image: url('/img/bloom-bg.jpg')">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card shadow-lg" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="https://images.unsplash.com/photo-1611641613359-f698d54566dc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8Y2l0eSUyMGJ1aWxkaW5nfGVufDB8fDB8fA%3D%3D&w=1000&q=80"
                                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center"
                                style="background-image: url('/img/memphis-bg.jpg'); border-radius: 1rem;; border-radius:1rem">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form>
                                        @csrf

                                        <div
                                            class="d-flex flex-column align-items-center justify-content-center mb-3 pb-1">
                                            <div class="multiple-images">
                                                <img src="/img/logo-tsel.png" alt="Logo Telkomsel" width="75"
                                                    height="75">
                                                <img src="/img/telkomsel.png" alt="telkomsel" width="200">
                                            </div>
                                            <span class="h1 fw-bold mb-0 pt-2">Monitoring Rectifier</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your
                                            account</h5>

                                        <div class="form-outline mb-4">
                                            <input name="username" type="username" id="username"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="username">Username</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input name="password" type="password" id="password"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="password">Password</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-primary btn-lg btn-block"
                                                type="button">Login</button>
                                        </div>
                                        <a class="small text-muted" href="/home">Langsung ke Dashboard</a>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script>
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
            new mdb.Input(formOutline).init();
        });
    </script>
</body>

</html>
