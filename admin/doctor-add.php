<?
    include 'libs/load.php';

if(
   isset($_POST['name']) && !empty($_POST['name']) &&
   isset($_POST['phone']) && !empty($_POST['phone']) &&
   isset($_POST['address']) && !empty($_POST['address']) &&
   isset($_POST['special']) && !empty($_POST['special']) &&
   isset($_POST['fee']) && !empty($_POST['fee'])) {


    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $special = $_POST['special'];
    $fee = $_POST['fee'];

    if(Doctors::AddDoctor($name, $phone, $address, $special, $fee)){
        ?>
        
        <h1>Docter Added <br> ID : <?=Doctors::getLastDocId()?></h1>
        
        <?
    }

} else{


    $specialList = Doctors::listSpecial();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor Form</title>
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

<div class="container">
    <h1 class="text-center mb-4">Add Doctor Form</h1>
    <form action="doctor-add.php" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="speciality">Speciality:</label>
            <select name="special" class="form-control" id="">
                <?
                if($specialList->num_rows > 0){
                while($list = $specialList->fetch_assoc()){
                ?>
                <option value="<?=$list['sp_id']?>"><?=$list['sp_name']?></option>

                <?}
                }?>
            </select>
            
        </div>
        <div class="form-group">
            <label for="fee">Fee:</label>
            <input type="number" class="form-control" id="fee" name="fee" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?}?>