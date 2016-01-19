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
            // $_SESSION['credit_balance'] = 0;

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
        $result = $this->query($sql, $rows, $num_rows, $last_id);
        if ($result) {
            return $rows;
        }
    }

    public function set_credit($data = array()) {
        /*
          $sql = "INSERT INTO `credit`(`id`, `packet`, `credit`, `date_added`, `time_added`, `status`, `member_id`)
          VALUES (NULL,'" . $data['pack'] . "'," . $data['credit'] . ", '" . $date . "','" . $time . "','pending','" . $_SESSION['member_id'] . "')";
         */
        $date_added = date('Y-m-d H:i:s');
        $date_expired = date('Y-m-d H:i:s', strtotime('+1 days', strtotime($date_added)));

        $sql = "INSERT INTO `credit`(`invoice_id`, `packet`, `credit`, `free`, `date_added`, `date_expired`, `status`, `member_id`) ";
        $sql .= "VALUES (NULL,'" . $data['packet'] . "'," . $data['credit'] . "," . $data['free'] . ", '" . $date_added . "', '" . $date_expired . "', 'pending', " . $this->member_id . ")";

        $result = $this->query($sql, $rows, $num_rows, $last_id);
        if ($result) {
            $_SESSION['invoice_id'] = $last_id;
            return true;
        } else {
            return false;
        }
    }

    public function get_credit_by_invoice_id($invoice_id) {
        $sql = "SELECT * FROM credit WHERE invoice_id = " . $invoice_id . ";";
        $result = $this->query($sql, $rows, $num_rows, $last_id);
        if ($result) {
            return $rows[0];
        }
    }

    public function login($data = array()) {
        $sql = "SELECT * FROM member Where username = '" . $data['username'] . "' AND password = '" . $data['password'] . "';";
        $result = $this->query($sql, $rows, $num_rows);
        if ($result) {
            // print "num row : " . $num_rows;
            if ($num_rows > 0) {
                $this->member_id = $rows[0]['member_id'];
                if ($this->set_last_login_time()) {
                    foreach ($rows[0] as $key => $value) {
                        $_SESSION[$key] = $value;
                    }
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //admin
    public function get_credit_by_invoice_id_manager($invoice_id) {
        $sql = "SELECT * FROM credit INNER JOIN member ON credit.member_id = member.member_id WHERE credit.invoice_id = " . $invoice_id . ";";
        $result = $this->query($sql, $rows, $num_rows, $last_id);
        if ($result) {
            return $rows[0];
        }
    }

    public function get_list_credit_no_confirm() {
        $sql = "SELECT * FROM credit WHERE status = 'transfered';";
        $result = $this->query($sql, $rows, $num_rows, $last_id);
        if ($result) {
            return $rows;
        }
    }

    public function update_confirm_credit($data = array()) {
        $sql = "UPDATE credit SET status = 'confirm',date_confirm=NOW(),manager_id='" . $data['manager_id'] . "' WHERE invoice_id = '" . $data['invoice_id'] . "';";
        $result = $this->query($sql, $rows, $num_rows, $last_id);
        if ($result) {
            return true;
        }
    }

    public function admin_login($data = array()) {
        $sql = "SELECT * FROM admin WHERE u_user = '" . $data['user'] . "'  AND u_pass = '" . $data['pass'] . "';";
        $result = $this->query($sql, $rows, $num_rows, $last_id);
        if ($result) {
            // print "num row : " . $num_rows;
            if ($num_rows > 0) {
                foreach ($rows[0] as $key => $value) {
                    $_SESSION[$key] = $value;
                }
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
