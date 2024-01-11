@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-2"></div>

        <!-- Signup content  -->
        <div class="col-lg-6 signup">
          <!-- Title -->
          <h1>Sign up</h1>

          <!-- Login form -->
          <form action="{{route('register')}}" method="post" class="signup-form">
             @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input
                type="text"
                id="name"
                name="name"
                class="form-control
                @error ('name') is-invalid @enderror"
                placeholder="Enter your name"
                required
              />
            </div>

            <div class="form-group">
              <label for="emil">Email Address </label>
              <input
                type="email"
                id="email"
                name="email"
                class="form-control
                @error ('email') is-invalid @enderror"
                value="{{old('email')}}"
                placeholder="Enter email address"
                required autocomplete
              />
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input
                type="password"
                id="password"
                name="password"
                class="form-control
                @error ('password') is-invalid @enderror"
                placeholder="Enter password"
                required autocomplete
              />
            </div>

            <div class="form-group">
              <label for="password">Password Confirmation</label>
              <input
                type="password"
                id="confirmation"
                name="password_confirmation"
                class="form-control"
                placeholder="Confirm password"
                required
              />
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
          </form>
          <!-- /form -->
        </div>

        <div class="col-lg-2">
          
        </div>
    </div>
@endsection