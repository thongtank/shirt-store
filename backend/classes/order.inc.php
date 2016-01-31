<?php

namespace classes {

    use config\database as db;

    class order extends db {

        public $member_id, $product_id, $order_id, $cash_id, $amount, $size, $detail, $address, $price, $typeofpay;

        public function set_order() {
            $sql = "INSERT INTO `orders`(`order_id`, `total`, `typeofpay`, `date_added`, `member_id`) VALUES (NULL,0,'" . $this->typeofpay . "',NOW()," . $this->member_id . ")";
            $result = $this->query($sql, $rows, $num_rows, $last_id);
            if ($result) {
                $this->order_id = $last_id;
                // ถ้าเกิดเป็นการจ่ายแบบเงินสดให้ insert table cash_detail
                if ($this->typeofpay == 'cash') {
                    $result = null;
                    $rows = null;
                    $num_rows = null;
                    if ($this->set_cash_detail()) {
                        return ture;
                    } else {
                        return false;
                    }
                } else {
                    return true;
                }
            } else {
                return false;
            }
        }

        private function set_cash_detail() {
            $expire_date = date('Y-m-d H:i:s', strtotime('+1 days', strtotime($date_added)));
            $sql = "INSERT INTO `cash_detail`(`cash_id`, `status`, `date_added`, `date_expired`, `date_update_status`, `order_id`, `member_id`) ";
            $sql .= "VALUES (null,'pending',NOW(),'" . $expire_date . "',NOW()," . $this->order_id . " , " . $this->member_id . ")";
            $result = $this->query($sql, $rows, $num_rows, $last_id);
            if ($result) {
                $this->cash_id = $last_id; // set default cash_id
                return true;
            } else {
                return false;
            }
        }

        public function set_order_detail() {
            $sql = "INSERT INTO `orders_detail`(`order_detail_id`, `product_id`, `size`, `order_id`, `manager_id`, `price`, `address`, `status`, `detail`, `amount`, `date_update_status`) ";
            $sql .= "VALUES (NULL," . $this->product_id . ",'" . $this->size . "'," . $this->order_id . ",''," . $this->price . ",'" . $this->address . "','pending','" . $this->detail . "'," . $this->amount . ",NOW());";
            $result = $this->query($sql, $rows, $num_rows, $last_id);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }

        public function get_order_by_member_id() {
            $sql = "SELECT * FROM orders WHERE member_id = " . $this->member_id . ";";
            $result = $this->query($sql, $rows, $num_rows, $last_id);
            if ($result) {
                return $rows;
            } else {
                return false;
            }
        }

        public function get_order_detail_by_order_id($order_id = 0) {
            $sql = "SELECT * FROM `orders_detail` WHERE `order_id` = " . $order_id;
            $result = $this->query($sql, $rows, $num_rows, $last_id);
            if ($result) {
                return $rows;
            } else {
                return false;
            }
        }

        public function update_order_total_price($total_price = 0) {
            $sql = "UPDATE `orders` SET `total`=" . $total_price . " WHERE order_id = " . $this->order_id;
            // print $sql;
            $result = $this->query($sql, $rows, $num_rows, $last_id);
            if ($result) {
                if ($this->typeofpay == 'cash') {
                    if ($this->update_cash_request_price($total_price)) {
                        // เพิ่มราคาที่ลูกค้าต้องโอน
                        return true;
                    } else {
                        return false;
                    }
                }
                return true;
            } else {
                return false;
            }
        }

        public function update_cash_request_price($total_price = 0) {
            $rand = rand(1, 99) / 100;
            $total_price += $rand;
            $sql = "UPDATE `cash_detail` SET request_cash = " . $total_price . " WHERE cash_id = " . $this->cash_id;
            $result = $this->query($sql, $rows, $num_rows, $last_id);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }

        public function update_cash_status($request_cash = 0, $bank_to = '') {
            $sql = "UPDATE `cash_detail` SET bank_to = '" . $bank_to . "', status = 'transfered' WHERE request_cash = " . $request_cash . " AND cash_id = " . $this->cash_id . " AND member_id = " . $this->member_id . " AND order_id = " . $this->order_id . ";";
            $result = $this->query($sql, $rows, $num_rows, $last_id);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }

        public function count_order_by_product_id() {
            $sql = "SELECT SUM(amount) as sum_amount FROM orders_detail WHERE product_id = " . $this->product_id . "";
            // echo $sql;
            $result = $this->query($sql, $rows, $num_rows, $last_id);
            if ($result) {
                if ($rows[0]['sum_amount'] == '') {
                    $rows[0]['sum_amount'] = 0;
                }
                return $rows[0];

            } else {
                return false;
            }
        }

        public function get_cash_detail() {
            $sql = "SELECT * FROM cash_detail WHERE member_id = " . $this->member_id . " AND cash_id = " . $this->cash_id . " LIMIT 1";
            $result = $this->query($sql, $rows, $num_rows, $last_id);
            if ($result) {
                return $rows[0];
            } else {
                return false;
            }
        }
        //    ส่วนของ admin
        public function get_order_all() {
            $sql = "SELECT * FROM orders";
            $result = $this->query($sql, $rows, $num_rows, $last_id);
            if ($result) {
                return $rows;
            } else {
                return false;
            }
        }

    }

}
