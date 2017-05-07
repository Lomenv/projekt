<?php

class Pracovnici_model extends  CI_Model {

    function __construct()

    {
        $this->load->database();
    }

    function get_taxikar($id = FALSE)
    {

        if ($id === FALSE)
        {
            $query = $this->db->get('taxikar');
            return $query->result_array();
        }

        $query =  $this->db->get_where('taxikar', array('idTaxikar' => $id));
        return $query->row_array();

    }

    public function get_taxikar2() {
        return $this->db->get('taxikar');
    }




    function set_taxikar($id = 0)
    {

        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit') {
                $data[$key] = $value;
            }
        }

        if ($id == 0) {
            return $this->db->insert('taxikar', $data);
        } else {
            $this->db->where('idTaxikar', $id);
            return $this->db->update('taxikar', $data);
        }

    }

    function delete_taxikar($id) {
        $this->db->where('idTaxikar', $id);
        return $this->db->delete('taxikar');
    }


    function insert_taxikar($data){
        $this->db->insert('taxikar', $data);
    }
}
?>