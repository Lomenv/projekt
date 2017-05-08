<?php

class Jazda_model extends  CI_Model {

    function __construct()

    {
        $this->load->database();
    }

    function get_jazda($id = FALSE)
    {

        if ($id === FALSE)
        {
            $query = $this->db->get('jazda');
            return $query->result_array();
        }

        $query =  $this->db->get_where('jazda', array('idJazda' => $id));
        return $query->row_array();

    }

    public function get_jazda2() {
        return $this->db->get('jazda');
    }




    function set_jazda($id = 0)
    {

        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit') {
                $data[$key] = $value;
            }
        }

        if ($id == 0) {
            return $this->db->insert('jazda', $data);
        } else {
            $this->db->where('idJazda', $id);
            return $this->db->update('jazda', $data);
        }

    }

    function delete_jazda($id) {
        $this->db->where('idJazda', $id);
        return $this->db->delete('jazda');
    }

    function insert_jazda($data){
        $this->db->insert('jazda', $data);
    }

}
?>