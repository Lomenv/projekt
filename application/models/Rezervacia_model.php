<?php

class Rezervacia_model extends  CI_Model {

    function __construct()

    {
        $this->load->database();
    }

    function get_rezervacia($id = FALSE)
    {

        if ($id === FALSE)
        {
            $query = $this->db->get('rezervacia');
            return $query->result_array();
        }

        $query =  $this->db->get_where('rezervacia', array('idRezervacia' => $id));
        return $query->row_array();

    }

    public function get_rezervacia2() {
        return $this->db->get('rezervacia');
    }




    function set_rezervacia($id = 0)
    {

        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit') {
                $data[$key] = $value;
            }
        }

        if ($id == 0) {
            return $this->db->insert('rezervacia', $data);
        } else {
            $this->db->where('idRezervacia', $id);
            return $this->db->update('rezervacia', $data);
        }

    }

    function delete_rezervacia($id) {
        $this->db->where('idRezervacia', $id);
        return $this->db->delete('rezervacia');
    }

    function insert_rezervacia($data){
        $this->db->insert('rezervacia', $data);
    }
}
?>