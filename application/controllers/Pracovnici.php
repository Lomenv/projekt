<?php

class Pracovnici extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pracovnici_model');
        $this->load->helper('url_helper');
        $this->load->database();
        $this->load->library('session');
    }

    public function index()
    {

        $data['taxikar'] = $this->Pracovnici_model->get_taxikar();
        $data['title'] = 'taxikar';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('pracovnici/index', $data);
        //$this->load->view('template/footer');

    }

    public function view($id = NULL) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['taxikar_item'] = $this->Pracovnici_model->get_taxikar($id);


        if (empty( $data['taxikar_item'])) { show_404(); }

        $data['title'] = $data['taxikar_item']['idTaxikar'];
        $data['subtitle'] = $data['taxikar_item']['meno'] . ' ' .  $data['taxikar_item'] ['priezvisko'];
        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('pracovnici/view', $data);
        $this->load->view('template/footer');
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if(empty($id)) {
            show_404();
        }

        $taxikar_item = $this->Pracovnici_model->get_taxikar($id);
        $this->Pracovnici_model->delete_taxikar($id);
        redirect(base_url().'index.php/pracovnici');

    }
    public function edit() {

        $id = $this->uri->segment(3);

        if(empty($id)) { show_404(); }

        $this->load->helper('form');
        $this->load->library('form_validation');


        $data['taxikar_item'] = $this->Pracovnici_model->get_taxikar($id);

        $data['title'] = 'Editovať pracovníka: ';
        $data['subtitle'] = $data['taxikar_item']['meno'] . ' ' .  $data['taxikar_item'] ['priezvisko'];


        $this->form_validation->set_rules('idTaxikar','','required');
        $this->form_validation->set_rules('meno','','required');
        $this->form_validation->set_rules('priezvisko','','required');
        $this->form_validation->set_rules('telefon','P','required');
        $this->form_validation->set_rules('hodinovaMzda','','required');
        $this->form_validation->set_rules('datumNarodenia','','required');
        $this->form_validation->set_rules('cisloVodicskehoPreukazu','','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('pracovnici/edit', $data);
            $this->load->view('template/footer');
        } else {
            $this->Pracovnici_model->set_taxikar($id);
            redirect(base_url().'index.php/pracovnici');

        }


    }

    public function taxikar_page() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $taxikary = $this->Pracovnici_model->get_taxikar2();
        $data = array();

        foreach ($taxikary->result() as $r) {
            $data[] = array($r->idTaxikar,
                $r->meno,
                $r->priezvisko,
                $r->telefon,
                $r->hodinovaMzda,
                $r->datumNarodenia,
                $r->cisloVodicskehoPreukazu);
        }

        $output = array("draw" => $draw,
            "recordsTotal" => $taxikary->num_rows(),
            "recordsFiltered" => $taxikary->num_rows(),
            "data" => $data);
        echo json_encode($output);
        exit();
    }

    public function  insert() {
        $data['title'] = 'Add driver: ';
        $data['subtitle'] = '';
        $this->load->helper('form');
        $this->load->library('form_validation');


        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->form_validation->set_rules('FirstName','FirstName','required');
        $this->form_validation->set_rules('LastName','LastName','required');
        $this->form_validation->set_rules('PhoneContact','PhoneContact','required');
        $this->form_validation->set_rules('HourlyWage','HourlyWage','required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('drivers/create');
            $this->load->view('template/footer');
        } else {
            $data = array(
                'FirstName' => $this->input->post('FirstName'),
                'LastName' => $this->input->post('LastName'),
                'PhoneContact' => $this->input->post('PhoneContact'),
                'HourlyWage' => $this->input->post('HourlyWage')
            );
            $this->Drivers_model->insert_driver($data);
            $data['message'] = 'Data Inserted Successfully';

            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('home');
            $this->load->view('template/footer');
        }
    }



}
?>