<?php
include 'libs/load.php';
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

</head>

<body>
    <!-- ***** Header Area Start ***** -->
    <? load_template('__header');?>
    <!-- ***** Header Area End ***** -->

        <!-- ***** Breadcumb Area Start ***** -->
    <section class="breadcumb-area bg-img gradient-background-overlay" style="height:20px">
    </section>

   
    <? 
    if($_GET['doc'] and !empty($_GET['doc'])){
        try {
            $date = $_GET['date'];
            $doc = Doctors::getWithDoctorNameWithDate(trim(preg_replace("/\s*(?:[\d_]|[^\w\s])+/", "", $_GET['doc'])), $_GET['date']);
        } catch (Exception) {
            $doc = Doctors::getWithDoctorNameOnly(trim(preg_replace("/\s*(?:[\d_]|[^\w\s])+/", "", $_GET['doc'])));
        }

        ?>
    <div class="container mt-5">
        <div class="row">
           <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title"><?=ucwords($_GET['doc'])?></h3>
                    </div>
    </div>
        <?

    
        if($doc->num_rows > 0){
            while($result = $doc->fetch_assoc()){?>
        <div class="col-sm-4">
            <div class="card">
            <div class="card-body">
                <figcaption class="blockquote-footer" style="font-size: 0.85rem;"> Specialization</figcaption>
                <h6 class="card-text mx-5 text-uppercase"><?=$result['sp_name']?> </h6>
                <figcaption class="blockquote-footer" style="font-size: 0.85rem;"> Available Date</figcaption>
                <h6 class="card-text mx-5"><?=$result['available_date']?> </h6>
                <figcaption class="blockquote-footer" style="font-size: 0.85rem;"> Time</figcaption>
                <h6 class="card-text mx-5"><?=$result['available_time_start']?> - <?=$result['available_time_end']?> </h6>
                <figcaption class="blockquote-footer" style="font-size: 0.85rem;"> Patient Count</figcaption>
                <h6 class="card-text mx-5"><?=$result['patient_count']?> </h6>
                <a href="appointment.php?id=<?=base64_encode($result['id'])?>&docid=<?=base64_encode($result['doc_id'])?>&doc_name=<?=base64_encode($result['doc_name'])?>&special=<?=$result['sp_id']?>&date=<?=$result['available_date']?>&time=<?=$result['available_time_start']?>" class="btn btn-primary" data-mdb-ripple-init>Book Now</a>
        
            </div>
            </div>
    
        </div>
        <?}
    }else{

        ?>
    <section class="breadcumb-area bg-img gradient-background-overlay">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title text-center">No Records Found</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Breadcumb Area End ***** -->

        <?
    }
}
    else if($_GET['special'] and !empty($_GET['special'])){

        try {
            $date = $_GET['date'];
            $spl = Doctors::getWithSpecializationWithDate(trim(preg_replace("/\s*(?:[\d_]|[^\w\s])+/", "", $_GET['special'])), $_GET['date']);
        } catch (Exception) {
            $spl = Doctors::getWithSpecializationOnly(trim(preg_replace("/\s*(?:[\d_]|[^\w\s])+/", "", $_GET['special'])));
        }

    ?>
        <div class="container mt-5">
            <div class="row">
            <div class="col-12">
                        <div class="breadcumb-content">
                            <h3 class="breadcumb-title"><?=ucwords($_GET['special'])?></h3>
                        </div>
        </div>
            <?

        if($spl-> num_rows > 0){
                while($result = $spl->fetch_assoc()){?>
            <div class="col-sm-4">
                <div class="card">
                <div class="card-body">
                    <figcaption class="blockquote-footer" style="font-size: 0.85rem;"> Doctor Name</figcaption>
                    <h6 class="card-text mx-5 text-uppercase"><?=$result['doc_name']?> </h6>
                    <figcaption class="blockquote-footer" style="font-size: 0.85rem;"> Available Date</figcaption>
                    <h6 class="card-text mx-5"><?=$result['available_date']?> </h6>
                    <figcaption class="blockquote-footer" style="font-size: 0.85rem;"> Time</figcaption>
                    <h6 class="card-text mx-5"><?=$result['available_time_start']?> - <?=$result['available_time_end']?> </h6>
                    <figcaption class="blockquote-footer" style="font-size: 0.85rem;"> Patient Count</figcaption>
                    <h6 class="card-text mx-5"><?=$result['patient_count']?> </h6>
                    <a href="appointment.php?id=<?=base64_encode($result['id'])?>&docid=<?=base64_encode($result['doc_id'])?>&doc_name=<?=base64_encode($result['doc_name'])?>&special=<?=$result['sp_id']?>&date=<?=$result['available_date']?>&time=<?=$result['available_time_start']?>" class="btn btn-primary" data-mdb-ripple-init>Book Now</a>
            
                </div>
                </div>
            
                </div>
                <?}
        }else{

        ?>
    <section class="breadcumb-area bg-img gradient-background-overlay">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title text-center">No Records Found</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Breadcumb Area End ***** -->

        <?
    }

}else{

    ?>
    <section class="breadcumb-area bg-img gradient-background-overlay">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title text-center">No Records Found</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Breadcumb Area End ***** -->

        <?
    
}

    ?>


</div>
        </div>
        </div>
    </div>

    <div class="section-padding-100-50">
        <div class="container"></div>
    </div>

    <?=load_template('__footer')?>
</body>

</html>