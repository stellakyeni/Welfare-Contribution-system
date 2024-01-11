<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jungle Green Navigation Bar with Dropdown</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }


        nav {
            background-color: #2E8B57;
            /* Jungle Green */
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            /* Fixed position at the top of the viewport */
            top: 0;
            width: 100%;
            z-index: 1000;
            /* Ensure the navigation bar is above other content */
        }


        .logo {
            max-width: 100px;
            /* Adjust the maximum width as needed */
            position: relative;
            /* Relative positioning for the logo container */
        }

        nav a {
            color: #FFF;
            /* White */
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            font-size: 16px;
            font-weight: bold;
            display: inline-block;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #3CB371;
            /* Medium Sea Green - a slightly lighter shade on hover */
        }

        /* Dropdown styles */
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: none;
            position: absolute;
            background-color: #2E8B57;
            /* Jungle Green */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        nav li {
            display: inline-block;
            position: relative;
        }

        nav li:hover ul {
            display: block;
            position: absolute;
            top: 100%;
            left: 0;
        }

        nav ul li {
            display: block;
        }

        nav ul a {
            padding: 10px 20px;
            margin: 0;
            border-radius: 0;
        }
    </style>
</head>

<body>
    <div class="mt-10">
        <nav>
            <div class="logo">
                <img src="{{ asset('images/logo1.jpg') }}" alt="Logo" class="logo">
            </div>
            <a href="{{ route('home') }}"><i class="fas fa-home pe-2"></i>Home</a>
            <a href="{{ route('about-us') }}"><i class="fas fa-info-circle pe-2"></i>About</a>

            @guest
                <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt pe-2"></i>Login </a>
            @endguest
            @auth
                <li>
                    <a href=""><i class="fas fa-user pe-2"></i>Profile</a>
                    <ul>
                        <li><a href="{{ route('profile') }}">My profile</a></li>
                        <li><a href="{{ route('my-contributions') }}">Contributions</a></li>
                        <li><a href="{{ route('get-contributions') }}"></a></li>
                    </ul>
                </li>

                <li>
                    <a href=""><i class="fas fa-users pe-2"></i>Member Records</a>
                    <ul>
                        <li><a href="{{ route('members') }}">Members</a></li>
                        <li><a href="{{ route('member-list') }}">Member Details</a></li>
                        <li><a href="{{ route('get-contributions') }}">Contributions</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ 'logout' }}"
                        onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i
                            class="fas fa-sign-out-alt pe-2"></i>
                        @csrf
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endauth

        </nav>
    </div>
</body>

</html>
