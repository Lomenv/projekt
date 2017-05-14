<?php

class Zmeny extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Zmena_model');
        $this->load->helper('url_helper');
        $this->load->database();
        $this->load->library('session');
    }

    public function index()
    {

        $data['zmenyprac'] = $this->Zmena_model->get_zmenyprac();
        $data['zmena'] = $this->Zmena_model->get_zmena();
        $data['title'] = 'Pracovné zmeny';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('zmeny/index', $data);
        //$this->load->view('template/footer');

    }

    public function view($id = NULL) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['zmenaprac_item'] = $this->Zmena_model->get_zmenyprac($id);
        $data['zmena'] = $this->Zmena_model->get_zema();
        $data['taxikar'] = $this->Zmena_model->get_taxikar();
        $data['taxikar_item'] = $this->Zmena_model->get_taxikar();
        $data['zmena_item'] = $this->Zmena_model->get_zmena();



        if (empty( $data['zmenaprac_item'])) { show_404(); }
        if (empty( $data['zmena_item'])) { show_404(); }

        $data['title'] = $data['zmenaprac_item']['idZmenyPrac'];
        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('zmeny/view', $data);
        $this->load->view('template/footer');
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if(empty($id)) {
            show_404();
        }

        $zmenyprac_item = $this->Zmena_model->get_zmenyprac($id);
        $this->Zmena_model->delete_zmenyprac($id);
        redirect(base_url().'index.php/zmeny');

    }
    public function edit() {

        $id = $this->uri->segment(3);

        if(empty($id)) { show_404(); }

        $this->load->helper('form');
        $this->load->library('form_validation');


        $data['zmenyprac_item'] = $this->Zmena_model->get_zmenyprac($id);

        $data['title'] = 'Upraviť pracovnú zmenu: ';


        $this->form_validation->set_rules('idZmenyPrac','','required');
        $this->form_validation->set_rules('idTaxikar','','required');
        $this->form_validation->set_rules('idZmena','','required');



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('zmeny/edit', $data);
            $this->load->view('template/footer');
        } else {
            $this->Zmena_model->set_zmenyprac($id);
            redirect(base_url().'index.php/zmeny');

        }


    }

    public function  insert() {
        $data['title'] = 'Pridať pracovnú zmenu: ';
        $data['subtitle'] = '';
        $this->load->helper('form');
        $this->load->library('form_validation');


        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->form_validation->set_rules('idTaxikar','','required');
        $this->form_validation->set_rules('idZmena','','required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('zmeny/insert');
            $this->load->view('template/footer');
        } else {
            $data = array(
                'idTaxikar' => $this->input->post('idDriver'),
                'idZmena' => $this->input->post('idShift')
            );
            $this->Zmena_model->insert_zmenyprac($data);
            $data['message'] = 'Data Inserted Successfully';

            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('home');
            $this->load->view('template/footer');
        }
    }

    public function zmena_page() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $zmenyprace = $this->Zmena_model->get_zmenyprac2();
        $data = array();

        foreach ($zmenyprace->result() as $r) {
            $data[] = array($r->idZmenyPrac,
                $r->idTaxikar,
                $r->idZmena);

        }

        $output = array("draw" => $draw,
            "recordsTotal" => $zmenyprace->num_rows(),
            "recordsFiltered" => $zmenyprace->num_rows(),
            "data" => $data);
        echo json_encode($output);
        exit();
    }



}
?>