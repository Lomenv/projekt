<?php

class Vozidla_model extends  CI_Model {

    function __construct()

    {
        $this->load->database();
    }

    function get_vozidla($id = FALSE)
    {

        if ($id === FALSE)
        {
            $query = $this->db->get('auto');
            return $query->result_array();
        }

        $query =  $this->db->get_where('auto', array('idAuto' => $id));
        return $query->row_array();

    }

    public function get_vozidla2() {
        return $this->db->get('auto');
    }




    function set_vozidla($id = 0)
    {

        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit') {
                $data[$key] = $value;
            }
        }

        if ($id == 0) {
            return $this->db->insert('auto', $data);
        } else {
            $this->db->where('idAuto', $id);
            return $this->db->update('auto', $data);
        }

    }

    function delete_vozidla($id) {
        $this->db->where('idAuto', $id);
        return $this->db->delete('auto');
    }


    function insert_auto($data){
        $this->db->insert('auto', $data);
    }


}
?>