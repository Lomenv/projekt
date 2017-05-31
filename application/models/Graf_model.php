<?php
class Graf_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    //get fruts data
    public function get_jazdy()
    {
        return $this->db->get('jazda')->result();
    }

    public function get_auto()
    {
        return $this->db->get('auto')->result();
    }

    public function get_vek() {
        $this->db->select('SUBSTRING(datumNarodenia,1,4) AS datum, meno, priezvisko');
        $this->db->from('taxikar');
        $query = $this->db->get();
        return $query->result();
    }

}