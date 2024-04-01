<?php
include_once '/work/libs/load.php';

class Session
{
    private $data;
    private $conn;
    public $uid;
    public $token;

    public static function authenticate($user, $pass)
    {
        //Rename login function
        $username = User::login($user, $pass);
        if ($username) {
            try {
                $user = new User($username);
            } catch(Exception) {
                return false;
            }
            $conn = Database::getConnection();
            $ip = $_SERVER['REMOTE_ADDR'];
            $agent = $_SERVER['HTTP_USER_AGENT'];
            $token = md5(rand(0, 9999999) . $ip . $agent);
            $sql = "INSERT INTO `tb_session` (`uid`, `token`, `ip`, `userAgent`, `active`)
            VALUES ('$user->id', '$token',  '$ip', '$agent', '1')";
            if ($conn->query($sql)) {
                $_SESSION['user_id'] = $user->id;
                $_SESSION['user_name'] = $user->email;
                setcookie("sessionToken", $token, strtotime('+3 days'));
                return $token;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    

    public static function authorization($token)
    {
        try {
            $Session = new Session($token);
            return $Session;

        } catch(Exception) {}
    }

    public function __construct($token)
    {
        $this->conn = Database::getConnection();
        $this->data = null;
        $sql = "SELECT * FROM `tb_session` WHERE `token`='$token' LIMIT 1";
        $result = $this->conn->query($sql);
        $s_rate = false;
        if ($result->num_rows) {
            $row = $result->fetch_assoc();
            $token = $row['token'];
            $id = $row['uid'];
            $get_user = "SELECT * FROM `tb_user` WHERE `user_id` = '$id' LIMIT 1";
            $result = $this->conn->query($get_user);
            if ($result->num_rows){
                $row = $result->fetch_assoc();
                $_SESSION['user_id']= $row['user_id'];
                $_SESSION['user_name']= $row['email'];
                setcookie("sessionToken", $token, strtotime('+3 days'));
                $s_rate = true;
            }
        }
        if($s_rate){
            return true;

        }else{return false;}
    }


    public static function removeUserSession($token)
    {
        $conn = Database::getConnection();
        $sql = "DELETE FROM `tb_session` WHERE `token` = '$token';";
        if($conn->query($sql)) {
            $conn->close;
            return true;
        } else {
            return false;
        }

    }
}
