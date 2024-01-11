@extends('layouts.main')
@section('content')

    <!DOCTYPE html>
    <title>Contribute</title>

    <head>
        <style>

        </style>
    </head>

    <div class="card-body">
        @if (session()->has('success'))
            ;
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <!-- Registering a User -->

        <body>
            <!-- form Details -->

            <div class="bs-stepper-content">
                <marquee>Send money to PayBill 247247, Acc Number 121121. Equity Bank</marquee>

                <form method="POST" action="{{ route('edit-contribute') }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @csrf
                    <!-- contribution Details -->
                    <div class="bs-stepper-content">
                        <div id="social-links" class="content">
                            <div class="content-header mb-3">
                                <h3 class=></h3>

                            </div>

                            <div class="container">

                                <form method="POST" action="{{ route('update', $data['contribution']->id) }}"
                                    onsubmit="return validateForm()">
                                    @csrf
                                    method('PUT')
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                    <label class="form-label" for="google-icons">Month</label>
                                    <label for="month">Choose a month:</label>
                                    <select id="month" name="month" class="form-control" required>
                                        <option value="">Select Month</option>
                                        <option value="Jan">January</option>
                                        <option value="feb">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="Sep">September</option>
                                        <option value="Oct">October</option>
                                        <option value="Nov">November</option>
                                        <option value="Dec">December</option>
                                    </select>
                            </div><br>
                            <div class="container">
                                <label for="year">Year:</label>
                                <input type="number" id="year" class="form-control" name="year" min="2023"
                                    max="2100" required>
                            </div>
                            <div class="container">
                                <label class="form-label" for="google-icons">Payment Number</label>
                                <input type="text" name="p_number" id="google-icons" class="form-control"
                                    placeholder="ex 0712345678" required />
                            </div>
                            <div class="container">
                                <label class="form-label" for="google-icons">Payment Name</label>
                                <input type="text" name="p_name" id="google-icons" class="form-control"
                                    placeholder="ex Joe Kimathi" required />
                            </div>
                            <div class="container">
                                <label class="form-label" for="twitter-icons">Amount</label>
                                <input type="text" id="twitter-icons" name="p_amount" class="form-control"
                                    placeholder="ex 1000" required />
                            </div>
                            <div class="container">
                                <label class="form-label" for="facebook-icons">Payment Code</label>
                                <input type="text" id="facebook-icons" name="p_code" class="form-control"
                                    placeholder="ex QL3OAXBN9" required />
                            </div> <br>

                            <div class="container">
                                <label for="acceptTerms">
                                    <input type="checkbox" id="acceptTerms" required>
                                    Confirm the Details are True Last Time
                                </label>
                            </div>
                        </div>
                    </div>
            </div>
    </div>


    <!-- Review -->
    <div class="bs-stepper-content">

        <div class="container">
            <button class="btn btn-" type="submit">Update</button>
        </div>
    </div>

    </form>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper@1.7.0/dist/js/bs-stepper.min.js"></script>
    <script>
        function validateForm() {
            var checkBox = document.getElementById("acceptTerms");

            if (!checkBox.checked) {
                alert("Please confirm the payment details are true.");
                return false;
            }

            // Other form validation logic goes here

            // If everything is valid, the form will be submitted
            return true;
        }
    </script>

    </body>

    </html>
