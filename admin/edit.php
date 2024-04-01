
<?
    include 'libs/load.php';
    if($_SESSION['status'] != 'active'){
        header("location: login");
    }
    $id = $_GET['id'];

    $result = Doctors::getAppointment($id);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>

<?
    if($result -> num_rows == 1){
        $detail = $result -> fetch_assoc();
?>
    <div class="container">
        <h1 class="text-center mb-4">Update Form</h1>
        <form action="update.php" method="POST">
            <div class="form-group">
                <label for="appointer_name">Appointer Name:</label>
                <input type="text" class="form-control" id="appointer_name" name="appointer_name" value="<?=$detail['r_name']?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" value="<?=$detail['r_phone']?>" name="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" value="<?=$detail['r_address']?>" name="address" required>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" value="<?=$detail['r_date']?>" name="date" required>
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="time" class="form-control" id="time" value="<?=$detail['r_time']?>" name="time" required>
            </div>
            <div class="form-group">
                <label for="doctor">Doctor:</label>
                <input type="text" class="form-control" id="doctor" name="doctor" value="<?=$detail['doc_name']?>" disabeled required>
            </div>
            <div class="form-group">
                <label for="special">Special:</label>
                <input type="text" class="form-control" id="special" name="special" value="<?=$detail['sp_name']?>" disabeled required>
            </div>
            <div class="form-group">
                <label for="bill">Bill:</label>
                <input type="number" class="form-control" id="bill" name="bill" value="<?=$detail['bill']?>" disabeled required>
                <input type="number" class="form-control d-none" id="id" name="id" value="<?=$detail['A_id']?>" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?}?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
