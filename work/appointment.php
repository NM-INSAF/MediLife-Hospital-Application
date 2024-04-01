<?php
include 'libs/load.php';
if((Session::authorization($_COOKIE['sessionToken']) == false) or (!isset($_SESSION['user_id'])) ) {
    header("Location:/work/login/");
}
?>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Medilife - Health &amp; Medical Template | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>
    <!-- ***** Header Area Start ***** -->
    <? load_template('__header');?>
    <!-- ***** Header Area End ***** -->

        <!-- ***** Breadcumb Area Start ***** -->
    <section class="breadcumb-area bg-img gradient-background-overlay" style="height:20px">
    </section>

    
    <div class="container my-5 py-5">
<?if(isset($_GET['id']) and !empty($_GET['id']) and isset($_GET['docid']) and !empty($_GET['docid']) and isset($_GET['doc_name']) and !empty($_GET['doc_name']) and isset($_GET['special']) and !empty($_GET['special']) and isset($_GET['date']) and !empty($_GET['date']) and isset($_GET['time']) and !empty($_GET['time'])){
    $id = htmlentities(base64_decode($_GET['id']));
    $doc_id = htmlentities(base64_decode($_GET['docid']));
    $doc_name = htmlentities(base64_decode($_GET['doc_name']));
    $special = htmlentities($_GET['special']);
    $date = htmlentities($_GET['date']);
    $time = htmlentities($_GET['time']);
    if(Doctors::checkAvailable($id, $doc_id, $doc_name, $special, $date, $time)){

?>
  <!--Section: Design Block-->
  <div class="row">
    <div class="col-md-8 mb-4">
      <div class="card mb-4">
        <div class="card-header py-3">
          <h5 class="mb-0">Make An Appointment</h5>
        </div>
        <div class="card-body">
          <form action="appointment.php">
            <!-- Text input -->
            <div class="form-outline mb-4">
            <label class="form-label" for="fullname">Full Name</label>
              <input type="text" id="Appname" name="fullname" class="form-control" required>              
            </div>


            <div class="form-outline mb-4">
            <label class="form-label" for="form7Example3">Phone Number</label>
              <input type="number" id="phone" name="phone" class="form-control" required>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
            <label class="form-label" for="form7Example3">Address</label>
              <input type="text" id="address" class="form-control" required>
            </div>

          </form>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card mb-4">
        <div class="card-header py-3">
          <h5 class="mb-0">Summary</h5>
        </div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <div id='A-id' class="d-none"><?=$id?></div>
            <div id= 'D-id' class="d-none"><?=$doc_id?></div>
            <div id= 'sp-id' class="d-none"><?=$special?></div>

          <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
              <div>
                <strong>Doctor Name</strong>

              </div>
              <div id = 'docName'>
                 <span><strong><?=$doc_name?></strong></span>
              </div>
            </li>


          <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
              <div>
                <strong>Date</strong>

              </div>
              <div id='AppointmentDate'>
                  <span><strong><?=$date?></strong></span>
              </div>
            </li>


          <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <strong>Time</strong>
              <div id='AppointmentTime'>
                 <span><strong><?=$time?></strong></span>
              </div>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
              Doctor Charge
              <span><?=number_format(Doctors::getFee($doc_id))?></span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
              Platform Charge
              <span><?=number_format(240)?></span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
              <div>
                <strong>Total amount</strong>

              </div>
              <span><strong><?=number_format(Doctors::getFee($doc_id) + 240)?></strong></span>
            </li>
          </ul>

          <button type="button" id="makeAppointment" name="submit" class="btn btn-primary btn-lg btn-block">
            Submit
          </button>
        </div>
      </div>
    </div>
  </div>
  <!--Section: Design Block-->

  </div>

  </div>

  <?}?>

<?}?>


      <!-- jQuery (Necessary for All JavaScript Plugins) -->
      <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Active js -->
    <script src="js/api.js"></script>

  </body>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    
  </html>