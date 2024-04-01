<?php
    include 'libs/load.php';
    if($_SESSION['status'] != 'active'){
        header("location: login");
    }
    $result = Doctors::getAppointmentList();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Accordion Menu with Plus Minus Icon</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</style>
<script>
$(document).ready(function(){
	// Add minus icon for collapse element which is open by default
	$(".collapse.show").each(function(){
		$(this).siblings(".card-header").find(".btn i").html("remove");
		$(this).prev(".card-header").addClass("highlight");
	});
	
	// Toggle plus minus icon on show hide of collapse element
	$(".collapse").on('show.bs.collapse', function(){
		$(this).parent().find(".card-header .btn i").html("remove");
	}).on('hide.bs.collapse', function(){
		$(this).parent().find(".card-header .btn i").html("add");
	});
	
	// Highlight open collapsed element 
	$(".card-header .btn").click(function(){
		$(".card-header").not($(this).parents()).removeClass("highlight");
		$(this).parents(".card-header").toggleClass("highlight");
	});
});
</script>
</head>
<body>


<nav class="navbar navbar-expand-lg bg-dark navbar-light bg-light mb-5 mt-2">
  <div class="container-fluid">
    <a class="navbar-brand rounded  px-5 bg-light" href="#">Appointments</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
    </div>
  </div>
</nav>



<div class="mx-4 text-center ">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered  table-striped">
                <thead>
                    <tr>
                        <th>Appointer Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Doctor</th>
                        <th>Special</th>
                        <th>Bill</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($list = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?= $list['r_name'] ?></td>
                                <td><?= $list['r_phone'] ?></td>
                                <td><?= $list['r_address'] ?></td>
                                <td><?= $list['r_date'] ?></td>
                                <td><?= $list['r_time'] ?></td>
                                <td><?= $list['doc_name'] ?></td>
                                <td><?= $list['sp_name'] ?></td>
                                <td><?= $list['bill'] ?></td>
                                <td>
                                    <a class="btn btn-danger" href="delete.php?id=<?= $list['A_id'] ?>">Delete</a>
                                    <a class="btn btn-primary" href="edit.php?id=<?= $list['A_id'] ?>">Edit</a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>