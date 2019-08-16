<?php
/**
 * Created by PhpStorm.
 */

class Users extends CI_Model {
    public function listUsers($offset=0) {
        return $this->db->query("SELECT * from dropandrun.users LIMIT 10 OFFSET $offset");
    }
}