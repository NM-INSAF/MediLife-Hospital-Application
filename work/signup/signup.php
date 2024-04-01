<?php 
require __DIR__.'/../libs/load.php';

//this will check wheather the user loged in and it not let him to access signup.php while Authenticated

if((Session::authorization($_COOKIE['sessionToken']) == true) and (isset($_SESSION['user_id'])) ) {
    header("Location: /work/");
    exit;
}

$signup = false;
//make sure the required things are filled properly
do {

if (
    isset($_POST["fullname"]) and !empty($_POST["fullname"]) and
    isset($_POST["address"]) and !empty($_POST["address"]) and
    isset($_POST["phone"]) and !empty($_POST["phone"]) and
    isset($_POST["gender"]) and !empty($_POST["gender"]) and
    isset($_POST["email"]) and !empty($_POST["email"]) and
    isset($_POST["password"]) and !empty($_POST["password"]) and
    isset($_POST["confirmpassword"]) and !empty($_POST["confirmpassword"])
    ){
        
        $fullname = trim(preg_replace("/\s*(?:[\d_]|[^\w\s])+/", "", $_GET['fullname']));
        $address = trim(preg_replace("/[^\/,a-zA-Z0-9\s]+/", "", $_POST["address"]));
        $phone = trim(preg_replace("/[^+\d]/", "", $_POST["phone"]));
        $gender = trim(preg_replace("/\s*(?:[\d_]|[^\w\s])+/", "", $_POST["gender"]));
        $email =  filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        $confirmpassword = $_POST["confirmpassword"];
        
        if($password == $confirmpassword){
            $result = User::signup($fullname,$address,$phone,$gender,$email,$password);
            $signup = true;
            if($signup) {
                if ($result) {
                    // Redirect to the document root
                    header("Location: /work/");
                    exit; // Ensure that no further code is executed after the redirect

                    
            }
        }else{
            break;
        }

        }	
}   
} while (0);

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body{
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: url('https://img.freepik.com/free-photo/stethoscope-blue-background_23-2147874867.jpg?w=1800&t=st=1711762437~exp=1711763037~hmac=7297cd47199b3e2c30cd53f21a72813a55869ad53cf508600be1e42d8bd9d09a');
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
input.form-control, select.form-control {
    padding: 11px;
    border: none;
    border: 2px solid #405c7cb8;
    border-radius: 30px;
    background-color: transparent;
    font-family: Arial, Helvetica, sans-serif;
}

input.form-control:focus, select.form-control:focus {
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
    <?=load_template('__signup')?>
</div>

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
