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
    
    public static function getAppointmentList(){
        $conn = Database::getConnection();
        $sql = "select tb_appointment.*, tb_doc.doc_name, tb_special.sp_name
        from tb_appointment inner join tb_doc on tb_appointment.doc_id = tb_doc.doc_id
        inner join tb_special on tb_doc.doc_special = tb_special.sp_id order by tb_appointment.A_id asc;";
        $result = $conn->query($sql);
        return $result;
    }



    public static function getAppointment($id){
        $conn = Database::getConnection();
        $sql = "select tb_appointment.*, tb_doc.doc_name, tb_special.sp_name
        from tb_appointment inner join tb_doc on tb_appointment.doc_id = tb_doc.doc_id
        inner join tb_special on tb_doc.doc_special = tb_special.sp_id where tb_appointment.A_id = $id;";
        $result = $conn->query($sql);
        return $result;
    }


    public static function updateRecord($id, $name, $phone, $address, $date, $time){
        $conn = Database::getConnection();
        $sql = "UPDATE tb_appointment
        INNER JOIN tb_doc ON tb_appointment.doc_id = tb_doc.doc_id
        INNER JOIN tb_special ON tb_doc.doc_special = tb_special.sp_id
        SET 
            tb_appointment.r_name = '$name',
            tb_appointment.r_phone = '$phone',
            tb_appointment.r_address = '$address',
            tb_appointment.r_date = '$date',
            tb_appointment.r_time = '$time'
        WHERE tb_appointment.A_id = $id;";
        if($conn->query($sql)){
            return true;
        }
    }


    public static function deleteRecord($id){
        $conn = Database::getConnection();
        $sql = "DELETE FROM tb_appointment WHERE A_id = $id;";
        if($conn->query($sql)){
            return true;
        }
    }

    public static function listSpecial(){
        $conn = Database::getConnection();
        $sql = "SELECT * FROM tb_special;";
        $result = $conn -> query($sql);
        return $result;
    }

    //followings are for adding doctors...
    public static function getLastDocId(){
        $conn = Database::getConnection();
        $sql = "SELECT doc_id from tb_doc order by doc_id desc limit 1;";
        $result = $conn -> query($sql);
        $id = $result->fetch_assoc();
        return $id['doc_id'];
    }


    public static function AddDoctor($doc_name,$doc_phone,$doc_address,$doc_special,$fee){
        $conn = Database::getConnection();
            $id = Doctors::getLastDocId();
            $id = Doctors::DocID_increment($id);
        $sql = "INSERT INTO tb_doc (doc_id, doc_name, doc_phone, doc_address, doc_special, fee) 
        VALUES ('$id', '$doc_name', '$doc_phone', '$doc_address', '$doc_special', $fee);";
        if($conn->query($sql)){ 
            return true;
        }else{ return false;}

    }

    public static function DocID_increment($variable) {
        $numeric_part = substr($variable, 2);
        $numeric_part_incremented = intval($numeric_part) + 1;
        $numeric_part_padded = str_pad($numeric_part_incremented, strlen($numeric_part), "0", STR_PAD_LEFT);
        $new_variable = substr($variable, 0, 2) . $numeric_part_padded;
        return $new_variable;
    }
    

}