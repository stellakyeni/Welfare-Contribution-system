<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, 
                   initial-scale=1.0">
    <style>
        html,
        body {
            height: 100%;
            font-family: 'Ubuntu', sans-serif;
        }



        /* Sidebar styling */
        .sidebar {
            width: 250px;
            /* Adjust the width as needed */
            background-color: #f2f2f2;
            /* Sidebar background color */
            padding: 20px;
            position: fixed;
            height: 100%;
        }

        /* Sidebar links styling */
        .sidebar a {
            padding: 8px 16px;
            text-decoration: none;
            font-size: 18px;
            color: #333;
            /* Link color */
            display: block;
        }

        /* Highlight the current page link */
        .sidebar a.active {
            background-color: #4CAF50;
            /* Active link background color */
            color: white;
        }

        /* Content area styling */
        .content {
            margin-left: 250px;
            /* Adjust the margin based on the sidebar width */
            padding: 16px;
        }

        /* Display the content next to the sidebar and not below it */
        @media screen and (max-width: 600px) {

            .sidebar,
            .content {
                width: 100%;
                margin-left: 0;
            }
        }


        .mynav {
            color: #fff;
        }

        .mynav li a {
            color: #fff;
            text-decoration: none;
            width: 100%;
            display: block;
            border-radius: 5px;
            padding: 8px 5px;
        }

        .mynav li a.active {
            background: rgba(255, 255, 255, 0.2);
        }

        .mynav li a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .mynav li a i {
            width: 25px;
            text-align: center;
        }

        .notification-badge {
            background-color: rgba(255, 255, 255, 0.7);
            float: right;
            color: #222;
            font-size: 14px;
            padding: 0px 8px;
            border-radius: 2px;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
            /* Adjust the margin as needed */
        }

        .logo {
            width: 80%;
            /* Adjust the width of the logo */
            max-width: 150px;
            /* Set a max-width to maintain responsiveness */
            height: auto;
            /* Maintain aspect ratio */
        }

        /* Sidebar styling */
        /* Sidebar styling */
        .sidebar {
            width: 250px;
            /* Adjust the width as needed */
            background-color: #f2f2f2;
            /* Sidebar background color */
            padding: 20px;
            position: fixed;
            height: 100%;
        }

        /* Sidebar links styling */
        .sidebar a {
            padding: 8px 16px;
            text-decoration: none;
            font-size: 18px;
            color: #333;
            /* Link color */
            display: block;
        }

        /* Highlight the current page link */
        .sidebar a.active {
            background-color: #4CAF50;
            /* Active link background color */
            color: white;
        }

        /* Content area styling */
        .content {
            padding: 10px;
            margin-left: 140px;
            /* Adjust the margin based on the sidebar width */
            margin-top: 0;
            /* Ensure content is at the top */
        }

        /* Display the content at the top and left side next to the sidebar */
        @media screen and (max-width: 600px) {

            .sidebar,
            .content {
                width: 100%;
                margin-left: 0;
            }
        }
    </style>
    <title>Welfare</title>
</head>

<body>

    <div class="container-fluid p-0 d-flex h-100 mt-2">
        <div id="bdSidebar"
            class="d-flex flex-column  
                    flex-shrink-0  
                    p-3 bg-success 
                    text-white offcanvas-md offcanvas-start">

            <div class="logo-container">
                <img src="{{ asset('images/logo1.jpg') }}" alt="Logo" class="logo">
            </div>

            <hr>

            <ul class="mynav nav nav-pills flex-column mb-auto">

                @guest
                    <li>
                        <a href="{{ route('login') }}" class="sidebar-link">
                            <i class="fas fa-sign-in-alt pe-2"></i>
                            <span class="topic"> Login</span>
                        </a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item mb-1">
                        <a href="{{ route('profile') }}">
                            <i class="fa-regular fa-user"></i>
                            Profile
                        </a>
                    </li>

                    <li class="nav-item mb-1">
                        <a href="{{ route('get-contributions') }}">
                            <i class="far fa-user"></i>

                            Members Record
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="{{ route('get-contributions') }}">
                            <i class="far fa-coins"></i>
                            Contributions
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="{{ route('my-contributions') }}">
                            <i class="fa-solid fa-archway"></i>
                            My Contribution
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="{{ route('members') }}">
                            <i class="fa-solid fa-graduation-cap"></i>
                            Members
                        </a>
                    </li>

                    <li class="sidebar-item  nav-item mb-1">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#settings" aria-expanded="false" aria-controls="settings">
                            <i class="fas fa-cog pe-2"></i>
                            <span class="topic">Settings </span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ 'logout' }}" class="sidebar-link"
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

            </ul>
            <hr>
            <div class="d-flex">

                <i class="fa-solid fa-book  me-2"></i>
                <span>
                    <h6 class="mt-1 mb-0">
                        This is a Welfare Fund
                    </h6>
                </span>
            </div>
        </div>

        <div class="bg-light flex-fill">
            <div class="p-2 d-md-none d-flex text-white bg-success">
                <a href="#" class="text-white" data-bs-toggle="offcanvas" data-bs-target="#bdSidebar">
                    <i class="fa-solid fa-bars"></i>
                </a>
                <span class="ms-3">GFG Portal</span>
            </div>
            <div class="p-4">
                <nav style="--bs-breadcrumb-divider:'>';font-size:14px">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <i class="fa-solid fa-house"></i>
                        </li>

                    </ol>
                </nav>

                <hr>
                <div class="row">
                    <div class="col">
                        <p>Welfare Contributions</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
