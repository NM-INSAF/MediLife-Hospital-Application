<?
 include 'libs/load.php';
 if($_SESSION['status'] != 'active'){
    header("location: login");
}
// Check if all required fields are set and not empty
if (
    isset($_POST['appointer_name']) and !empty($_POST['appointer_name']) and
    isset($_POST['phone']) and !empty($_POST['phone']) and
    isset($_POST['address']) and !empty($_POST['address']) and
    isset($_POST['date']) and !empty($_POST['date']) and
    isset($_POST['time']) and !empty($_POST['time']) and
    isset($_POST['doctor']) and !empty($_POST['doctor']) and
    isset($_POST['special']) and !empty($_POST['special']) and
    isset($_POST['bill']) and !empty($_POST['bill']) and 
    isset($_POST['id']) and !empty($_POST['id'])
) {
    echo 'Entering';
    // Assign values to variables
    $appointer_name = $_POST['appointer_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $doctor = $_POST['doctor'];
    $special = $_POST['special'];
    $bill = $_POST['bill'];
    $id = $_POST['id'];

    echo 'Passing';
    if(Doctors::updateRecord($id,$appointer_name,$phone,$address,$date,$time)){
        ?>

        <h1>Update Done <br> You are redirecting to main page</h1>
        <script>
        setTimeout(() => {
            window.location.href ="/admin/about.php"
        }, 3000);
         
    </script>
        
        <?
    }else{
        return false;
    }
 
} else {
   return false;
}
?>
