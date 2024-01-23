<!doctype html>
<html lang="lv">

    <head>
        <meta charset="utf-8">
        <title>{{ $title }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
        crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <style> 
            .mask-custom {
                backdrop-filter: blur(2px);
                background-color: rgba(178,60,253,0.1);
            }
        </style>
        <style>
            ::-webkit-scrollbar {
            width:auto;
            }

            ::-webkit-scrollbar-track {
                background: rgb(240,240,240);
            }

            ::-webkit-scrollbar-thumb {
                background:rgb(64,64,64);
                border-radius:10px;
            }
        </style>

    </head>

    <body>
        <div class="bg-image" style="background-image: url('/images/bg.png');">
        <div class="mask mask-custom">
        <header class="navbar navbar-dark mb-5" style="background-color: #392738;">
            <div class="container">
                <span class="navbar-brand mb-0 h1">{{ $title }}</span>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav">
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
        </header>

        <div style="min-height: 80.9vh;">
        <main class="container">
            <div class="text-white">
                <div id="root"></div>
            </div>
        </main>
        </div>
        <footer class="text-center p-4 mt-3 py-3" style="background-color: rgba(0, 0, 0, 0.45);">
            <div class="container">
                <div class="text-white">
                    A. Koļesņevs, VeA, 2024
                </div>
            </div>
        </footer>
        
        <script src="{{ asset('/js/app.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        </div>
        </div>
    </body>

</html>