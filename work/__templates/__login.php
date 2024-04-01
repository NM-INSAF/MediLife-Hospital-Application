

<div class="container">
  <div class="row">
    <!-- Left Blank Side -->
    <div class="col-lg-6"></div>

    <!-- Right Side Form -->
    <div class="col-lg-6 d-flex align-items-center justify-content-center right-side">
      <div class="form-2-wrapper">
        <div class="logo text-center">
          <h1><strong>Login Here</strong></h1>
        </div>
        <h2 class="text-center mb-4">Sign Into Your Account</h2>
        <form action="/work/login/" method="POST">
          <div class="mb-3 form-box">
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" required>
          </div>
          <div class="mb-3">
            <hr>
          </div>
          <button type="submit" class="btn btn-outline-secondary login-btn w-100 mb-3">Login</button>
        </form>

        <!-- Register Link -->
        <p class="text-center register-test mt-3">Don't have an account? <a href="/work/signup/" class="text-decoration-none">Register here</a></p>
      </div>
    </div>
  </div>
</div>