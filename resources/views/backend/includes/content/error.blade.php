<!DOCTYPE html>
<html lang="en">

<section id="content">

    <head>

        @include('backend.includes.navbar')
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap");
        --lato: "Lato",
        sans-serif;

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--lato);
        }

        .frem {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-image: url('{{ asset('backend/img/gifs.gif') }}');
            background-position: center;
            background-repeat: no-repeat;
        }

        .frem p {
            position: absolute;
            top: 3rem;
            font-size: 7rem;
            color: #00000063;
        }

        .frem h2 {
            position: absolute;
            bottom: 8rem;
            font-size: 34px;
        }

        .frem h5 {
            position: absolute;
            bottom: 6rem;
            color: #9c9c9c;
        }

        .frem a {
            position: absolute;
            bottom: 1rem;
            background: linear-gradient(45deg, #ff0034, #ffbc00);
            padding: 12px;
            color: white;
            text-decoration: none;
            font-size: 23px;
            border-radius: 13px;
        }
    </style>

    <body>
        <div class="frem">
            <p>404</p>
            <h2>Mohon Maaf</h2>
            <h5>Halaman Sortir Saham Belum Disediakan</h5>
            <a href="{{ route('Dashboard') }}">Kembali ke Dashboard</a>
        </div>
    </body>

</section>

</html>
