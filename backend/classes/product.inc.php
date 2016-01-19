<?php
namespace classes;

use config\database as db;

class product extends db {
    public $member_id, $path_dir, $extension, $file_name;
    public function set_product($data = array()) {
        $sql = "INSERT INTO `product`(`product_name`, `product_cotton`, `product_type`, `product_colour`, `product_detail`, `date_added`, `member_id`, `confirm_status`) ";
        $sql .= "VALUES ('" . $data['product_name'] . "','" . $data['p_cotton'] . "','" . $data['p_type'] . "','" . $data['p_color'] . "','" . $data['p_detail'] . "',NOW()," . $this->member_id . ",'pending');";
        // echo $sql;
        $result = $this->query($sql, $rows, $num_rows, $last_id);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function upload_mockup($data = array()) {
        // ตรวจสอบแฟ้ม
        if ($this->validate_path()) {
            // ตรวจสอบนามสกุล
            if ($this->validate_ext($data['name'])) {
                $file_name = $this->member_id . '_' . time() . '_mockup.' . $this->extension;
                // ตรวจสอบชื่อไฟล์
                if ($this->validate_file_name($file_name)) {
                    if (move_uploaded_file($data['tmp_name'], $this->path_dir . DS . $this->file_name)) {
                        return true;
                    } else {
                        // echo $data['tmp_name'] . ' === ' . $this->path_dir . DS . $this->file_name;
                        return "Sorry, there was an error uploading your file.";
                    }
                } else {
                    return "Sorry, file already exists.";
                }
            } else {
                return "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
            }
        } else {
            return "Failed for create directory";
        }
    }

    private function validate_path() {
        $target_dir = '../uploads/member_' . $this->member_id;

        /* ถ้าไม่มีแฟ้มให้สร้างแฟ้ม */
        if (!is_dir($target_dir)) {
            if (!mkdir($target_dir)) {
                return false;
            }
            if (!chmod($target_dir, 0755)) {
                return false;
            }
        }
        $this->path_dir = $target_dir;
        return true;

    }

    private function validate_file_name($file_name) {
        // ไฟล์ซ้ำหรือไม่
        if (file_exists($target_file)) {
            return false;
        }
        $this->file_name = $file_name;
        return true;
    }

    private function validate_ext($file_name) {
        $imageFileType = pathinfo($file_name, PATHINFO_EXTENSION);
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            return false;
        }
        $this->extension = $imageFileType;
        return true;
    }

    public function upload_detail_file() {

    }
}
