<?
// include '/work/libs/load.php';
require __DIR__.'/../libs/load.php';
//this will check wheather the user loged in and it not let him to access login.php while Authenticated
do {

if($_SESSION['status'] == 'active' ) {
    header("Location: /admin/");
    exit;
}

//make sure that username and password are entered....
if(isset($_POST['username']) and !empty($_POST['username']) and isset($_POST['password']) and !empty($_POST['password'])) {
    $username = htmlentities($_POST['username']);
    $password = $_POST['password'];

    if($username == 'admin' and (password_verify($password, '$2y$09$WOuqta97/Wl4beRvSxqmfeeIXi776tE64Z1R3cjX4LKqq9QwfHph6'))){
        $_SESSION['status'] = 'active'; 
        header("location: /admin");
        exit();
       }
    }
}while (0);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body{
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: url('https://img.freepik.com/free-photo/health-still-life-with-copy-space_23-2148854034.jpg?w=1800&t=st=1711771341~exp=1711771941~hmac=cbe1328a1007444f67c5d915e77f8596bee3b0008fc1172e5ededf60fbc1a449');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100vh;
    font-family: 'Roboto', sans-serif;
}

.form-2-wrapper {
    background: #9d00ff29;
    padding: 50px;
    border-radius: 8px;
}
input.form-control{
    padding: 11px;
    border: none;
    border: 2px solid #405c7cb8;
    border-radius: 30px;
    background-color: transparent;
    font-family: Arial, Helvetica, sans-serif;
   
   
}
input.form-control:focus{
    box-shadow: none !important;
    outline: 0px !important;
    background-color: transparent;
}
button.login-btn{
    background: #b400ff;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 30px;
}
.register-test a{
    color: #000;
}
.social-login button{
    border-radius: 30px;
}
    </style>
</head>
<body>
    



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
        <form action="/admin/login/" method="POST">
          <div class="mb-3 form-box">
            <input type="text" class="form-control" id="email" name="username" placeholder="Username" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
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

</body>
</html>