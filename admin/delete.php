<?
  if($_SESSION['status'] != 'active'){
    header("location: login");
}
else{

if(isset($_GET['id']) and !empty($_GET['id'])){
    include 'libs/load.php';

    if(Doctors::deleteRecord(preg_replace("/[^0-9]/", "", $_GET['id']))){
        ?>
        <h1>Record Deleted... <br> You are redirecting to main page</h1>
        <script>
        setTimeout(() => {
            window.location.href ="/admin/about.php"
        }, 3000);
         
    </script>
        
        <?
    }
}else{
    echo 'error';
}
}