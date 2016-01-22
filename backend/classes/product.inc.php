<?php
namespace classes;

use config\database as db;

class product extends db {
    public $member_id, $product_id, $path_dir, $extension, $file_name, $last_id;
    public function set_product($data = array(), $mockup_name = "") {
        $sql = "INSERT INTO `product`(`product_name`, `product_cotton`, `product_type`, `product_colour`, `product_detail`, `date_added`, `member_id`, `confirm_status`, `product_mockup`) ";
        $sql .= "VALUES ('" . $data['product_name'] . "','" . $data['p_cotton'] . "','" . $data['p_type'] . "','" . $data['p_color'] . "','" . $data['p_detail'] . "',NOW()," . $this->member_id . ",'pending', '" . $mockup_name . "');";
        // echo $sql;
        $result = $this->query($sql, $rows, $num_rows, $last_id);
        if ($result) {
            $this->last_id = $last_id;
            return true;
        } else {
            return false;
        }
    }

    public function update_file_product($product_file) {
        $sql = "UPDATE product SET product_file" . $product_file . " = '" . $this->file_name . "' WHERE product_id = " . $this->last_id . ";";
        $result = $this->query($sql, $rows, $num_rows, $last_id);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function get_product_by_member_id() {
        $sql = "SELECT * FROM product WHERE member_id = " . $this->member_id;
        $result = $this->query($sql, $rows, $num_rows, $last_id);
        if ($result) {
            return $rows;
        } else {
            return false;
        }
    }

    public function get_product_by_product_id() {
        $sql = "SELECT * FROM `product` WHERE `product_id` = " . $this->product_id . " AND member_id = " . $this->member_id . " LIMIT 1";
        $result = $this->query($sql, $rows, $num_rows, $last_id);
        if ($result) {
            return $rows[0];
        } else {
            return false;
        }
    }

    public function delete_product() {
        if ($this->delete_image()) {
            $sql = "DELETE FROM `product` WHERE member_id = " . $this->member_id . " AND product_id = " . $this->product_id;
            $result = $this->query($sql, $rows, $num_rows, $last_id);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            echo '';
            return false;
        }
    }

    public function delete_image() {
        $sql = "SELECT `product_mockup`, `product_file1`, `product_file2`, `product_file3`, `product_file4`, `product_file5`, `product_file6` FROM `product` WHERE member_id = " . $this->member_id . " AND product_id = " . $this->product_id . " LIMIT 1";
        $result = $this->query($sql, $rows, $num_rows, $last_id);
        if ($result) {
            $success = 1;
            foreach ($rows[0] as $k => $v) {
                // print $v . "<BR>";
                if (!empty($v)) {
                    if (!unlink('uploads' . DS . 'member_' . $this->member_id . DS . $v)) {
                        $success = 0;
                    }
                }
            }

            if ($success == 1) {
                return true;
            } else {
                return false;
            }
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
                        // echo $data['tmp_name'] . ' === ' . $this->path_dir . DS . $this->file_name;
                        return true;
                    } else {
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

    public function upload_files($data = array(), $i) {
        // ตรวจสอบนามสกุล
        if ($this->validate_ext($data['name'])) {
            $file_name = $this->member_id . '_' . time() . '_detail_' . $i . '.' . $this->extension;
            // ตรวจสอบชื่อไฟล์
            if ($this->validate_file_name($file_name)) {
                if (move_uploaded_file($data['tmp_name'], $this->path_dir . DS . $this->file_name)) {
                    return true;
                } else {
                    return "Sorry, there was an error uploading your file.";
                }
            } else {
                return "Sorry, file already exists.";
            }
        } else {
            return "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
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
        if (file_exists($this->path_dir . DS . $file_name)) {
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
