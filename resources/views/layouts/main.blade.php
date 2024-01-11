<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Monthly Contributions</title>
    <style>
        /* .mb-4 {
            height: 180px;
            width: 180px;
            background-color: rgb(23, 111, 199);
            /* Optional: Add background color for visibility
        } */
        li a:hover {
            background-color: #aa0b0b;
        }


        body {
            margin: 0;
            font-family: Arial, sans-serif;
            padding-top: 60px;
            /* Adjust as needed based on the height of your navigation bar */
        }

        /* Active state styling */
        .active {
            background-color: #4CAF50;
        }

        .modal-button-container {
            text-align: left;
            margin-bottom: 10px;
            /* Adjust margin as needed */
        }


        */
    </style>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('css/simple-blog-template.css') }}" rel="stylesheet" />
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href= 
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity= 
"sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href= 
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity= 
"sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link href="{{ asset('css/simple-blog-template.css') }}" rel="stylesheet" />

    <!--Font Awesome Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!--Font Awesome Icons-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bs-stepper@1.7.0/dist/css/bs-stepper.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper@1.7.0/dist/css/bs-stepper.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.10.1/dist/js/bootstrap.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</head>
{{-- <div class="text-center">
    <img src="{{ asset('/images/logo1.jpg') }}" alt="Logo" class="mb-4">
</div> --}}

<body>

    <!-- Navigation -->
    @include('partials.navbar')
    {{-- @include('partials.sidebar') --}}


    <!-- Add this code where you want the logo to appear -->

    <!-- Page Content -->
    <div class="container-fluid">

        <div class="content">

            <!-- Blog Entries Column -->
            @yield('content')


        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- Footer -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="bs-stepper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper@1.7.0/dist/js/bs-stepper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
        // JavaScript to set the active state
        function setActive(clickedElement) {
            // Remove the active class from all links
            var links = document.querySelectorAll("li a");
            links.forEach(function(link) {
                link.classList.remove("active");
            });

            // Add the active class to the clicked link
            clickedElement.classList.add("active");
        }
    </script>
    {{-- Script for Confirmation Tick --}}
    <script>
        $(document).ready(function() {
            $('#confirmButton').on('click', function() {
                $.ajax({
                    url: '{{ route('confirm-action') }}',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#confirmationTick').show();
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
    {{-- End of confrimation Tick --}}
</body>

</html>
