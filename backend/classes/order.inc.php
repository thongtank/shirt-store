<?php
namespace classes;

use config\database as db;

class order extends db {
    public $member_id, $product_id, $order_id, $amount, $size, $detail, $address, $price;

    public function set_order() {
        $sql = "INSERT INTO `orders`(`order_id`, `total`, `date_added`, `member_id`) VALUES (NULL,0,NOW()," . $this->member_id . ")";
        $result = $this->query($sql, $rows, $num_rows, $last_id);
        if ($result) {
            $this->order_id = $last_id;
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
            return true;
        } else {
            return false;
        }
    }
}
