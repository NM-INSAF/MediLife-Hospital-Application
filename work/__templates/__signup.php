<div class="container">
  <div class="row">
    <!-- Left Blank Side -->
    <div class="col-lg-6"></div>

    <!-- Right Side Form -->
    <div class="col-lg-6 d-flex align-items-center justify-content-center right-side">
      <div class="form-2-wrapper">
        <div class="logo text-center">
          <h1><strong>Sign Up</strong></h1>
        </div>
        <h2 class="text-center mb-4">Create Your Account</h2>
        <form action="/work/signup/" method="POST">
          <div class="mb-3">
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Your Full Name" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Your Address" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" required>
          </div>
          <div class="mb-3">
            <select class="form-control pt-2" id="gender" name="gender" required>
              <option value="">Select Your Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
          <hr>
          <div class="mb-3 form-box">
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Repeat Your Password" required>
          </div>
      
          <button type="submit" class="btn btn-outline-secondary login-btn w-100 mb-3" id="signup">Sign Up</button>
        </form>

        <!-- Register Link -->
        <p class="text-center register-test mt-3">Already have an account? <a href="/work/login/" class="text-decoration-none">Login here</a></p>
      </div>
    </div>
  </div>