<?php

class Zmena_model extends  CI_Model {

    function __construct()

    {
        $this->load->database();
    }

    function get_zmenyprac($id = FALSE)
    {

        if ($id === FALSE)
        {
            $query = $this->db->get('taxikar_has_zmena');
            return $query->result_array();
        }

        $query =  $this->db->get_where('taxikar_has_zmena', array('idZmenyPrac' => $id));
        return $query->row_array();

    }

    function get_zmena($id = FALSE)
    {

        if ($id === FALSE)
        {
            $query = $this->db->get('zmena');
            return $query->result_array();
        }

        $query =  $this->db->get_where('zmena', array('idZmena' => $id));
        return $query->row_array();

    }


    public function get_zmenyprac2() {
        return $this->db->get('taxikar_has_zmena');
    }

    public function get_zmena2() {
        return $this->db->get('zmena');
    }




    function set_zmenyprac($id = 0)
    {

        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit') {
                $data[$key] = $value;
            }
        }

        if ($id == 0) {
            return $this->db->insert('taxikar_has_zmena', $data);
        } else {
            $this->db->where('idZmenyPrac', $id);
            return $this->db->update('taxikar_has_zmena', $data);
        }

    }

    function set_zmena($id = 0)
    {

        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit') {
                $data[$key] = $value;
            }
        }

        if ($id == 0) {
            return $this->db->insert('zmena', $data);
        } else {
            $this->db->where('idZmena', $id);
            return $this->db->update('zmena', $data);
        }

    }

    function delete_zmenyprac($id) {
        $this->db->where('idZmena', $id);
        return $this->db->delete('taxikar_has_zmena');
    }


    function delete_zmena($id) {
        $this->db->where('idZmena', $id);
        return $this->db->delete('zmena');
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

    function insert_zmenyprac($data){
        $this->db->insert('taxikar_has_zmena', $data);
    }

}
?>