<?php
class User
{
    private $conn;
    public $id;
    public $email;
    public static function signup($fullname, $address, $phone, $gender, $email, $password)
    {
        $option = [
            'cost' => 9,
        ];
        $passwordHash = password_hash($password, PASSWORD_BCRYPT, $option);
        $conn = Database::getConnection();
        $sql = "INSERT INTO `tb_user` (`Fullname`, `address`, `phone`, `gender`, `email`, `password`)
        VALUES ('$fullname', '$address', '$phone', '$gender', '$email', '$passwordHash');";

        try {
            $result = $conn->query($sql);
            if ($result) {
                Session::authenticate($email, $password);
            }
            return $result;

        } catch (Exception) {
            return false;
        }
    }

    public static function login($email, $password)
    {
        $conn = Database::getConnection();
        $query = "SELECT * FROM `tb_user` WHERE `email` = '$email';";
        $result = $conn->query($query);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                return $row['email'];
            } else {
                return false;
            }
        }
    }

    public function __construct($email)
    {
        $this->conn = Database::getConnection();
        $this->id = null;
        $sql = "SELECT * FROM `tb_user` WHERE `email` = '$email' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $this->id = $row['user_id'];
            $this->email = $row['email'];
        } else {
            return false;
        }
    }


}
