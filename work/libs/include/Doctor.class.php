<?php

class Doctors{

    // private $doctorName = '';
    // private $special = '';
    // private $date = '';

    // function __construct($doctorName, $special, $date)
    // {
    //     try {
    //         $this->doctorName = htmlentities($doctorName);
    //     } catch (Exception) {}
    //     try {
    //         $this->special = htmlentities($special);
    //     } catch (Exception) {}
    //     try {
    //         $this->date = $date;
    //     } catch (Exception) {}
    // }
    
    public static function getWithDoctorNameOnly($doctorName){
        $conn = Database::getConnection();
        $sql = "select * from tb_doc
        inner join tb_special on tb_doc.doc_special = tb_special.sp_id inner join tb_available on tb_doc.doc_id = tb_available.doc_id where tb_doc.doc_name ='$doctorName' order by available_date asc, available_time_start asc";
        $result = $conn->query($sql);
        return $result;
    }

    public static function getWithDoctorNameWithDate($doctorName, $date){
        $conn = Database::getConnection();
        $sql = "select * from tb_doc
        inner join tb_special on tb_doc.doc_special = tb_special.sp_id inner join tb_available on tb_doc.doc_id = tb_available.doc_id where tb_doc.doc_name ='$doctorName' and tb_available.available_date = '$date' order by available_date asc, available_time_start asc";
        $result = $conn->query($sql);
        return $result;
    }
    
      
    public static function getWithSpecializationOnly($specialName){
        $conn = Database::getConnection();
        $sql = "select * from tb_doc
        inner join tb_special on tb_doc.doc_special = tb_special.sp_id inner join tb_available on tb_doc.doc_id = tb_available.doc_id where tb_special.sp_name ='$specialName' order by available_date asc, available_time_start asc";
        $result = $conn->query($sql);
        return $result;
    }

    public static function getWithSpecializationWithDate($specialName,$date){
        $conn = Database::getConnection();
        $sql = "select * from tb_doc
        inner join tb_special on tb_doc.doc_special = tb_special.sp_id inner join tb_available on tb_doc.doc_id = tb_available.doc_id where tb_special.sp_name ='$specialName' and tb_available.available_date= '$date' order by available_date asc, available_time_start asc";
        $result = $conn->query($sql);
        return $result;
    }
    

    public static function checkAvailable($id, $doc_id, $doc_name, $special, $date, $time){
        $sql = "select tb_doc.doc_id, tb_doc.doc_name, tb_special.sp_id, tb_available.available_date, tb_available.available_time_start
        from tb_doc inner join tb_special on tb_doc.doc_special = tb_special.sp_id 
        inner join tb_available on tb_doc.doc_id = tb_available.doc_id where tb_available.id = $id and tb_doc.doc_id = '$doc_id' and tb_doc.doc_name = '$doc_name'
        and tb_special.sp_id = '$special' and tb_available.available_date = '$date' and tb_available.available_time_start = '$time';";

        $conn = Database::getConnection();
        $result = $conn->query($sql);
        if($result -> num_rows > 0){
            return true;
        }else{
            return false;
        }
    }
    
    public static function getFee($doc_id){
        $sql = "select fee from tb_doc where doc_id = '$doc_id';";
        $conn = Database::getConnection();
        $result = $conn ->query($sql);
        $fee = $result -> fetch_assoc();
        return $fee['fee'];
    }
   
    public static function insertAppointment($doc_id, $AppName, $AppPhone, $AppAddress, $AppDate, $AppTime , $Bill){
        $sql = "INSERT INTO `tb_appointment` (`doc_id`, `r_name`, `r_phone`, `r_address`, `r_date`, `r_time`, `bill`)
        VALUES ('$doc_id', '$AppName', '$AppPhone', '$AppAddress', '$AppDate', '$AppTime' , '$Bill');";
        $conn = Database::getConnection();
        if($conn -> query($sql)){
            return true;
        }else{
            return false;
        }
    }
}