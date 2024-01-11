@extends('layouts.main')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welfare Contributions</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 12px;
                padding: 0;
                background: url('/images/pic2.jpg') center center fixed;
                background-size: cover;

            }

            header {
                background-color: rgba(0, 0, 0, 0.5);
                color: #fff;
                text-align: center;
                padding: 1em;
            }

            section {

                max-width: 800px;
                margin: 2em auto;
                padding: 1em;
                background-color: rgba(255, 255, 255, 0.8);
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            }

            h2 {
                color: #333;
            }

            p {
                color: #555;
            }

            footer {
                background-color: rgba(0, 0, 0, 0.5);
                color: #fff;
                text-align: center;
                padding: 1em;
                position: fixed;
                bottom: 0;
                width: 100%;
            }

            h5 {
                color: red;
                text-decoration: none;
            }

            content {
                margin-top: 50%;
            }
        </style>
    </head>

    <body>
        <header>

        </header>
        <div class="content">
            <section>
                <h2>Welcome to Our Welfare Contributions Platform</h2>
                <p>Make a difference by contributing to this Initiative. Your support can change lives!</p><br><br>

                <marquee>Our registraion fee is 1000/= to become a member</marquee><br>
                <h5>You want to join Us?</h5>
                <a href="{{ route('register') }}"><button>Join</button></a>

                <!-- Add more content as needed -->
            </section>
        </div>
    </body>

    </html>
@endsection
