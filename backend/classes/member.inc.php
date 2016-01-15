<?php
namespace classes;
// session_start();

use config\database as db;

class member extends db {

    public $member_id, $facebook_id, $firstname, $lastname, $gender, $email, $tel, $mobile, $credit;

    /** กรณีลงทะเบียนผ่าน facebook account */
    public function register($data = array()) {
        $sql = "SELECT * FROM member WHERE facebook_id = '" . $data['id'] . "'";
        $result = $this->query($sql, $rows, $num_rows);
        if (!$result) {
            return false;
        } else {
            if ($num_rows > 0) {
                // เมื่อเคยลงทะเบียนกับเว็บไซต์ไว้แล้ว
                $_SESSION['count_facebook_id'] = 1;
                foreach ($rows[0] as $key => $value) {
                    $_SESSION[$key] = $value;
                }
                $this->member_id = $_SESSION['member_id'];
                $this->firstname = $_SESSION['firstname'];
                $this->lastname = $_SESSION['lastname'];
                $this->gender = $_SESSION['gender'];
                $this->email = $_SESSION['email'];
                $this->tel = $_SESSION['tel'];
                $this->mobile = $_SESSION['mobile'];

                if ($this->get_balance()) {
                    $_SESSION['credit_balance'] = $this->credit;
                }

                if ($this->set_last_login_time()) {
                    // insert เวลาที่ login
                    $_SESSION['last_login'] = date("Y-m-d H:i:s");
                }

                return true;

            } else {
                // ยังไม่มีข้อมูลผู้ใช้ในฐานข้อมูล
                $_SESSION['count_facebook_id'] = 0;
                $facebook_id = $data['id'];
                $firstname = $data['first_name'];
                $lastname = $data['last_name'];
                $gender = $data['gender'];
                $email = $data['email'];

                $sql = "INSERT INTO `member`(`facebook_id`, `firstname`, `lastname`, `gender`, `email`, `credit_balance`, `date_create`)
                    VALUES ('" . $facebook_id . "',
                        '" . $firstname . "',
                        '" . $lastname . "',
                        '" . $gender . "',
                        '" . $email . "', 0, NOW());";
                $result = $this->query($sql, $rows, $num_rows, $last_id);
                if ($result) {
                    $_SESSION['member_id'] = $last_id;
                    $_SESSION['facebook_id'] = $facebook_id;
                    $_SESSION['firstname'] = $firstname;
                    $_SESSION['lastname'] = $lastname;
                    $_SESSION['gender'] = $gender;
                    $_SESSION['email'] = $email;
                    $_SESSION['credit_balance'] = 0;
                    return 1;
                } else {
                    return 0;
                }
            }
        }
    }

    public function update_member($data = array()) {
        $sql = "UPDATE `member` SET `username`='" . $data['username'] . "',`password`='" . $data['password'] . "',`firstname`='" . $data['firstname'] . "',`lastname`='" . $data['lastname'] . "',`gender`='" . $_SESSION['gender'] . "',`email`='" . $data['email'] . "',`tel`='" . $data['tel'] . "',`mobile`='" . $data['mobile'] . "',`last_login`=NOW() WHERE member_id = '" . $_SESSION['member_id'] . "';";
        $result = $this->query($sql, $rows, $num_rows);
        if ($result) {
            $_SESSION['username'] = $data['username'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['firstname'] = $data['firstname'];
            $_SESSION['lastname'] = $data['lastname'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['gender'] = $data['gender'];
            $_SESSION['mobile'] = $data['mobile'];
            $_SESSION['tel'] = $data['tel'];
            $_SESSION['credit_balance'] = 0;

            return 1;
        } else {
            return 0;
        }
    }

    public function new_register($data = array()) {
        $sql = "INSERT INTO `member`(`username`, `password`, `firstname`, `lastname`, `gender`, `email`, `tel`, `mobile`, `credit_balance`, `date_create`)
                    VALUES ('" . $data['username'] . "',
                        '" . $data['password'] . "',
                        '" . $data['firstname'] . "',
                        '" . $data['lastname'] . "',
                        '" . $data['gender'] . "',
                        '" . $data['email'] . "',
                        '" . $data['tel'] . "',
                        '" . $data['mobile'] . "' , 0, NOW());";
        $result = $this->query($sql, $rows, $num_rows, $last_id);
        if ($result) {
            $_SESSION['member_id'] = $last_id;
            $_SESSION['username'] = $data['username'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['firstname'] = $data['firstname'];
            $_SESSION['lastname'] = $data['lastname'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['gender'] = $data['gender'];
            $_SESSION['mobile'] = $data['mobile'];
            $_SESSION['tel'] = $data['tel'];
            $_SESSION['credit_balance'] = 0;
            return 1;
        } else {
            return 0;
        }
    }

    private function set_last_login_time() {
        $sql = "UPDATE member SET last_login = NOW() WHERE member_id = '" . $this->member_id . "';";
        $result = $this->query($sql, $rows, $num_rows);
        if ($result) {
            return true;
        }
    }

    public function get_balance() {
        $sql = "SELECT SUM(credit) AS credit FROM credit WHERE member_id = '" . $this->member_id . "';";
        // echo $sql;
        $result = $this->query($sql, $rows, $num_rows);
        if ($result) {
            $this->credit = $rows[0]['credit'];
            return true;
        }
    }

    public function get_list_credit() {
        $sql = "SELECT * FROM credit WHERE member_id = '" . $this->member_id . "';";
    }

    public function set_credit($data = array()) {
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $sql = "INSERT INTO `credit`(`id`, `package`, `credit`, `date_added`, `time_added`, `status`, `member_id`)
            VALUES (NULL,'" . $data['pack'] . "'," . $data['credit'] . ", '" . $date . "','" . $time . "','pending','" . $_SESSION['member_id'] . "')";
        $result = $this->query($sql, $rows, $num_rows);
        if ($result) {
            $_SESSION['credit_for_confirm'] = $data['credit'];
            return true;
        } else {
            return false;
        }
    }
}
