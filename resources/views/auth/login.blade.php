  @extends('layouts.main')
  {{-- @section('content') --}}
  @section('main-content')

      <!-- Page Content -->
      <div class="container">
          <div class="row">
              <div class="col-lg-2"></div>

              <!-- Login content  -->
              <div class="col-lg-8 login">
                  <!-- Title -->
                  <h1>Login</h1>

                  <!-- Login form -->
                  <form action="{{ route('login') }}" method="post" class="login-form">
                      @csrf
                      <div class="form-group">
                          <label for="email">Email Address </label>
                          <input type="email" id="email" name="email" class="form-control"
                              placeholder="Enter email address" required />
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              @enderror
                      </div>

                      <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" id="password" name="password" class="form-control"
                              placeholder="Enter password" required />
                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              @enderror
                      </div>

                      <button type="submit" class="btn btn-success">Log in</button>
                      <p>Forgot password? <a href="#">Reset Now</a></p>
                      <p>Don't have an account? <a href="{{ route('register') }}">Sign Up Now</a></p>
                  </form>
                  <!-- /form -->
              </div>

              <div class="col-lg-2"></div>
          </div>
          <!-- /.row -->
      </div>
      <!-- /.container -->

      <!-- Footer -->


      <!-- jQuery -->
