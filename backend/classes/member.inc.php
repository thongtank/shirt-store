<?php
namespace classes {
    use config\database as db;

    class member extends db {

        public $member_id, $facebook_id, $firstname, $lastname, $gender, $email, $tel, $mobile, $credit, $debit, $balance;
        /*
        MEMBER
         */
        /** กรณีลงทะเบียนผ่าน facebook account */
        public function register($data = array()) {
            $sql = "SELECT * FROM member WHERE facebook_id = '" . $data['id'] . "'";
            $result = $this->query($sql, $rows, $num_rows, $last_id);
            if (!$result) {
                return false;
            } else {
                if ($num_rows > 0) {
                    // เมื่อเคยลงทะเบียนกับเว็บไซต์ไว้แล้ว
                    $_SESSION['count_facebook_id'] = 1;
                    foreach ($rows[0] as $key => $value) {
                        $_SESSION[$key] = trim($value);
                    }
                    $this->member_id = $_SESSION['member_id'];
                    $this->firstname = $_SESSION['firstname'];
                    $this->lastname = $_SESSION['lastname'];
                    $this->gender = $_SESSION['gender'];
                    $this->email = $_SESSION['email'];
                    $this->tel = $_SESSION['tel'];
                    $this->mobile = $_SESSION['mobile'];

                    if ($this->cal_balance()) {
                        $_SESSION['credit_balance'] = $this->balance;
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
                    $result = $this->query($sql, $rows, $num_rows, $last_id, $last_id);
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
            $sql = "UPDATE `member` SET `firstname`='" . $data['firstname'] . "',`lastname`='" . $data['lastname'] . "',`gender`='" . $_SESSION['gender'] . "',`email`='" . $data['email'] . "',`tel`='" . $data['tel'] . "',`mobile`='" . $data['mobile'] . "',`last_login`=NOW() WHERE member_id = '" . $_SESSION['member_id'] . "';";
            $result = $this->query($sql, $rows, $num_rows, $last_id);
            if ($result) {
                // $_SESSION['username'] = $data['username'];
                // $_SESSION['password'] = $data['password'];
                $_SESSION['firstname'] = $data['firstname'];
                $_SESSION['lastname'] = $data['lastname'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['gender'] = $data['gender'];
                $_SESSION['mobile'] = $data['mobile'];
                $_SESSION['tel'] = $data['tel'];
                // $_SESSION['credit_balance'] = 0;
                if ($this->update_shop($_SESSION['member_id'], $data['shop_name'], $data['shop_detail'])) {
                    return 1;
                } else {
                    return 0;
                }
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
                $result = null;
                $rows = null;
                $num_rows = null;
                // $last_id = null;
                if ($this->set_shop($last_id, $data['shop_name'], $data['shop_detail'])) {
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return 0;
            }
        }

        private function set_shop($member_id, $shop_name, $shop_detail) {
            $sql = "INSERT INTO `shop`(`shop_id`, `shop_name`, `shop_detail`, `date_added`, `member_id`) VALUES (NULL, '" . $shop_name . "', '" . trim($shop_detail) . "', NOW(), " . $member_id . ");";
            $result = $this->query($sql, $rows, $num_rows, $last_id);
            if ($result) {
                $_SESSION['shop_id'] = $last_id;
                $_SESSION['shop_name'] = $shop_name;
                $_SESSION['shop_detail'] = $shop_detail;
                return 1;
            } else {
                return 0;
            }
        }

        private function update_shop($member_id, $shop_name, $shop_detail) {
            $sql = "UPDATE shop SET shop_name = '" . $shop_name . "', shop_detail = '" . trim($shop_detail) . "' WHERE member_id = " . $_SESSION['member_id'];
            $result = $this->query($sql, $rows, $num_rows, $last_id);
            if ($result) {
                $_SESSION['shop_name'] = $shop_name;
                $_SESSION['shop_detail'] = $shop_detail;
                return 1;
            } else {
                return 0;
            }
        }

        private function set_last_login_time() {
            $sql = "UPDATE member SET last_login = NOW() WHERE member_id = '" . $this->member_id . "';";
            $result = $this->query($sql, $rows, $num_rows, $last_id);
            if ($result) {
                return true;
            }
        }
        /*
        CREDIT
         */
        public function cal_balance() {
            // ยังไม่ได้ทำ get_debit()
            $credit_balance = 0;
            if ($this->get_credit()) {
                if ($this->get_debit()) {
                    $credit_balance = $this->credit - $this->debit;
                    $sql = "UPDATE member SET credit_balance = " . $credit_balance . ", date_last_cal_balance = NOW() WHERE member_id = " . $_SESSION['member_id'];
                    $result = $this->query($sql, $rows, $num_rows, $last_id);
                    if ($result) {
                        $this->balance = $credit_balance;
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

        public function get_credit() {
            $sql = "SELECT SUM(credit) as credit, SUM(free) AS free FROM credit WHERE member_id = '" . $this->member_id . "' and status = 'confirm';";
            $result = $this->query($sql, $rows, $num_rows, $last_id);
            if ($result) {
                $this->credit = $rows[0]['credit'] + $rows[0]['free'];
                return true;
            }
        }

        public function get_debit() {
            $sql = "SELECT SUM(total) as debit FROM orders WHERE member_id = " . $this->member_id;
            $result = $this->query($sql, $rows, $num_rows, $last_id);
            if ($result) {
                $this->debit = $rows[0]['debit'];
                return true;
            }
        }

        public function get_list_credit() {
            $sql = "SELECT * FROM credit WHERE member_id = '" . $this->member_id . "';";
            $result = $this->query($sql, $rows, $num_rows, $last_id, $last_id);
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

            $result = $this->query($sql, $rows, $num_rows, $last_id, $last_id);
            if ($result) {
                // ยังไม่ต้องคำนวณยอดเพราะยังไม่ผ่านการ confirm จาก admin
                // if ($this->cal_balance()) {
                //     $_SESSION['credit_balance'] = $this->balance;
                // }
                return $last_id;
                // $_SESSION['invoice_id'] = $last_id;
                // return true;
            } else {
                return 0;
            }

        }

        public function get_credit_by_invoice_id($invoice_id) {
            $sql = "SELECT * FROM credit WHERE invoice_id = " . $invoice_id . ";";
            $result = $this->query($sql, $rows, $num_rows, $last_id, $last_id);
            if ($result) {
                return $rows[0];
            }
        }

        public function cancel_credit($invoice_id) {
            $sql = "DELETE FROM `credit` WHERE invoice_id = " . $invoice_id . " AND member_id = " . $this->member_id;
            // print $sql;
            $result = $this->query($sql, $rows, $num_rows, $last_id, $last_id);
            if ($result) {
                return true;

            } else {
                return false;
            }
        }

        //admin
        public function get_credit_by_invoice_id_manager($invoice_id) {
            $sql = "SELECT * FROM credit INNER JOIN member ON credit.member_id = member.member_id WHERE credit.invoice_id = " . $invoice_id . ";";
            $result = $this->query($sql, $rows, $num_rows, $last_id, $last_id);
            if ($result) {
                return $rows[0];
            }
        }

        public function get_list_credit_no_confirm() {
            $sql = "SELECT * FROM credit WHERE status = 'transfered';";
            $result = $this->query($sql, $rows, $num_rows, $last_id, $last_id);
            if ($result) {
                return $rows;
            }
        }

        public function update_confirm_credit($data = array()) {
            $add_credit = $data['credit'] + $data['free'];
            $sql = "UPDATE credit SET  status = 'confirm', date_confirm=NOW(), manager_id='" . $data['manager_id'] . "' WHERE invoice_id = '" . $data['invoice_id'] . "' AND member_id = " . $data['member_id'] . ";";
            $result = $this->query($sql, $rows, $num_rows, $last_id, $last_id);
            // $sql_add_credit = "UPDATE member SET credit_balance = credit_balance +5000 WHERE member_id='" . $data['member_id'] . "'";
            // $this->query($sql_add_credit, $rows, $num_rows, $last_id);
            if ($result) {
                if ($this->cal_balance()) {
                    $_SESSION['credit_balance'] = $this->balance;
                }
                return true;
            }
        }

        public function admin_login($data = array()) {
            $sql = "SELECT * FROM admin WHERE u_user = '" . $data['user'] . "'  AND u_pass = '" . $data['pass'] . "';";
            $result = $this->query($sql, $rows, $num_rows, $last_id, $last_id);
            if ($result) {
                // print "num row : " . $num_rows;
                if ($num_rows > 0) {
                    foreach ($rows[0] as $key => $value) {
                        $_SESSION[$key] = $value;
                    }
                    return true;
                }
            }
        }

        public function transfer_credit($data = array()) {
            /*
            Array
            (
            [packet] => Credit Packet 500
            [bank_to] => 2
            [total] => 12222
            [hidden-credit] => 500
            [bank_transfer] => SCB
            [date_transfer] => 2016-12-31
            [time_transfer] => 00:59
            )
             */
            $sql = "UPDATE credit SET total = " . $data['total'] . ", date_make_confirm = NOW(), status = 'transfered', bank_to = '" . $data['bank_to'] . "', bank_transfer = '" . $data['bank_transfer'] . "', date_transfer = '" . $data['date_transfer'] . "', time_transfer = '" . $data['time_transfer'] . "' ";
            $sql .= "WHERE invoice_id = " . $data['invoice_id'] . " AND member_id = " . $this->member_id . ";";
            // echo $sql;
            $result = $this->query($sql, $rows, $num_rows, $last_id, $last_id);
            if ($result) {
                return 1;
            } else {
                return 0;
            }
        }

        /* LOGIN */
        public function login($data = array()) {
            // $sql = "SELECT * FROM member Where username = '" . $data['username'] . "' AND password = '" . $data['password'] . "';";
            $sql = "SELECT * FROM member INNER JOIN shop ON member.member_id = shop.member_id Where username = '" . $data['username'] . "' AND password = '" . $data['password'] . "' LIMIT 1;";
            $result = $this->query($sql, $rows, $num_rows, $last_id, $last_id);
            if ($result) {
                // print "num row : " . $num_rows;
                if ($num_rows > 0) {
                    $this->member_id = $rows[0]['member_id'];
                    if ($this->set_last_login_time()) {
                        foreach ($rows[0] as $key => $value) {
                            $_SESSION[$key] = $value;
                        }
                        if ($this->cal_balance()) {
                            $_SESSION['credit_balance'] = $this->balance;
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
    }
}
