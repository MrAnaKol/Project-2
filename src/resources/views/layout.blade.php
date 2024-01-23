<!doctype html>
<html lang="lv">
    
<head>
    <meta charset="utf-8">
    <title>Project 2 - {{ $title }}</title>
    <meta name="description" content="Tīmekļa Tehnoloģiju 2. praktiskais darbs">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
    crossorigin="anonymous"
    >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style> .mask-custom {
            backdrop-filter: blur(10px);
            background-color: rgba(178,60,253,0.1);
            }

            .btn1{
                background-color: teal;
                color: #fff;
            }

            .btn1:hover{
                background-color: #fff;
                color: teal;
                border-color: teal;
            }

            .btn2{
                background-color: #A94438;
                color: #fff;
            }

            .btn2:hover{
                background-color: #fff;
                color: #A94438;
                border-color: #A94438;
            }
    </style>

</head>

<body>
    <div class="bg-image" style="background-image: url('/images/bg2.png');">
    <div class="mask mask-custom">
    <nav class="navbar navbar-expand-md mb-3" data-bs-theme="dark" style="background-color: #594666;">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Project 2</span>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Mājaslapa</a>
                        </li>
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="/developers">Izstrādātāji</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/genres">Žanri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/games">Spēles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">
                            <i class="bi bi-box-arrow-right"></i>
                            Iziet</a>
                        </li>

                    @else

                        <li class="nav-item">
                            <a class="nav-link" href="/login">
                            <i class="bi bi-box-arrow-in-left"></i>
                            Ieiet</a>
                        </li>

                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div style="min-height: 81.75vh;">
    <main class="container">
        <div class="row">
            <div class="col">

                @yield('content')

            </div>
        </div>
    </main>
    </div>
    
    <footer class="text-bg-dark mt-4">
        <div class="container">
            <div class="row py-4">
                <div class="col">
                A. Koļesņevs, VeA 2ITB, 2024
                </div>
            </div>
        </div>
    </footer>

    <script src="/js/admin.js"></script>
    </div>
    </div>

</body>

</html>

