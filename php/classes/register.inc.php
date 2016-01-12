<?php
namespace classes;

use config\database as db;

class register extends db {
    public function set($data = array()) {
        if (parent::connection()) {
            $sql = "INSERT INTO `member`(`firstname`, `lastname`, `create_at`) VALUES (?,?,NOW())";
            // echo $sql;
            if ($stmt = $this->mysqli->prepare($sql)) {
                $stmt->bind_param('ss', $fname, $lname);
                $fname = $data['first_name'];
                $lname = $data['last_name'];
                $stmt->execute();
                parent::close_connection();
                if ($stmt->affected_rows) {
                    $stmt->close();
                    return true;
                } else {
                    print 'execute error : ' . $stmt->error;
                    $stmt->close();
                    return false;
                }
            } else {
                print 'prepare error : ' . $stmt->error;
                return false;
            }
        }
    }
}