@extends('layouts.main')
@section('content')

    <!DOCTYPE html>
    <title>Contributions</title>

    <head>

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

                <form method="POST" action="{{ route('store-member') }}" onsubmit="return validateForm()">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @csrf
                    <!-- Personal Info -->
                    <div id="personal-info" class="content">
                        <div class="content-header mb-3">
                            <h2 class="mb-0">Personal Infomation</h2>

                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="first-name-icons">First Name</label>
                                <input type="text" name="first_name" id="first-name-icons" class="form-control"
                                    placeholder="ex John" required />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="last-name-icons">Last Name</label>
                                <input type="text" name="last_name" id="last-name-icons" class="form-control"
                                    placeholder="ex Doe" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="google-icons">Gender</label>
                                <select id="gender" name="gender" class="form-control" required>
                                    <option value="">Select your gender</option>
                                    <option value="female">Female</option>
                                    <option value="male">Male</option>
                                    <option value="unisex">Unisex</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="last-name-icons">Id Number</label>
                                <input type="text" name="id_number" id="last-name-icons" class="form-control"
                                    placeholder="enter your ID" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="last-name-icons">Phone Number</label>
                                <input type="text" name="phone_number" id="last-name-icons" class="form-control"
                                    placeholder="ex 0712345678" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="address">County</label>
                                <input type="text" name="county"class="form-control" id="landmark"
                                    placeholder="enter your Current county" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="address">Ward</label>
                                <input type="text" name="ward"class="form-control" id="address"
                                    placeholder="enter your Current ward" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="landmark">Location</label>
                                <input type="text" name="location" class="form-control" id="landmark"
                                    placeholder="enter your current location" required>
                            </div>
                        </div>
                    </div>
            </div>

            <!-- Next Of kin Details -->
            <div class="bs-stepper-content">
                <div id="next of Kin" class="content">
                    <div class="content-header mb-3">
                        <h2 class="mb-0">Next of Kin Details</h2>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="first-name-icons">Name</label>
                        <input type="text" name="kin_name" id="first-name-icons" class="form-control"
                            placeholder="ex John" required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="last-name-icons">Phone Number</label>
                        <input type="text" name="kin_number" id="last-name-icons" class="form-control"
                            placeholder="ex 0712345678" required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="last-name-icons">Id Number/Birth Certificate</label>
                        <input type="text" name="kin_id" id="last-name-icons" class="form-control"
                            placeholder="either Id or Birth Certificate number"required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="last-name-icons">RelationShip</label>
                        <input type="text" name="kin_relationship" id="last-name-icons" class="form-control"
                            placeholder="mother, father etc.."required /> <br>
                    </div>
                </div>
            </div>



            <!-- contribution Details -->
            <div class="bs-stepper-content">
                <div id="social-links" class="content">
                    <div class="content-header mb-3">
                        <h3 class="mb-0">Contribution </h3>

                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="google-icons">Payment Number</label>
                        <input type="text" name="payment_number" id="google-icons" class="form-control"
                            placeholder="ex 0712345678" required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="google-icons">Payment Name</label>
                        <input type="text" name="payment_name" id="google-icons" class="form-control"
                            placeholder="ex Joe Kimathi" required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="twitter-icons">Amount</label>
                        <input type="text" id="twitter-icons" name="amount" class="form-control"
                            placeholder="ex 1000" required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="facebook-icons">Payment Code</label>
                        <input type="text" id="facebook-icons" name="code" class="form-control"
                            placeholder="ex QL3OAXBN9" required /><br>
                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <label for="acceptTerms">
                    <input type="checkbox" id="acceptTerms" required>
                    I accept the terms and conditions for this Welfare Group
                </label>
            </div>
    </div>
    </div>
    <!-- Review -->
    <div class="bs-stepper-content">
        <div class="col-12 d-flex justify-content-between">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </div>
    </div>
    </form>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper@1.7.0/dist/js/bs-stepper.min.js"></script>
    <script>
        function validateForm() {
            var checkBox = document.getElementById("acceptTerms");

            if (!checkBox.checked) {
                alert("Please accept the terms and conditions before submitting the form.");
                return false;
            }

            // Other form validation logic goes here

            // If everything is valid, the form will be submitted
            return true;
        }
    </script>

    </body>

    </html>
