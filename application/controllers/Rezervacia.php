<?php

class Rezervacia extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rezervacia_model');
        $this->load->helper('url_helper');
        $this->load->database();
        $this->load->library('session');
    }

    public function index()
    {

        $data['rezervacka'] = $this->Rezervacia_model->get_rezervacia();
        $data['title'] = 'rezervacka';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('rezervacia/index', $data);
        //$this->load->view('template/footer');

    }

    public function view($id = NULL) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['rezervacka_item'] = $this->Rezervacia_model->get_rezervacia($id);


        if (empty( $data['rezervacka_item'])) { show_404(); }

        $data['title'] = $data['rezervacka_item']['idRezervacia'];
        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('rezervacia/view', $data);
        $this->load->view('template/footer');
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if(empty($id)) {
            show_404();
        }

        $rezervacka_item = $this->Rezervacia_model->get_rezervacia($id);
        $this->Rezervacia_model->delete_rezervacia($id);
        redirect(base_url().'index.php/rezervacia');

    }
    public function edit() {

        $id = $this->uri->segment(3);

        if(empty($id)) { show_404(); }

        $this->load->helper('form');
        $this->load->library('form_validation');


        $data['rezervacka_item'] = $this->Rezervacia_model->get_rezervacia($id);

        $data['title'] = 'Zmeniť rezerváciu: ';



        $this->form_validation->set_rules('idRezervacia','','required');
        $this->form_validation->set_rules('datumAcas','','required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('rezervacia/edit', $data);
            $this->load->view('template/footer');
        } else {
            $this->Rezervacia_model->set_rezervacia($id);
            redirect(base_url().'index.php/rezervacia');

        }


    }

    public function rezervacia_page() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $rezervacky = $this->Rezervacia_model->get_rezervacia2();
        $data = array();

        foreach ($rezervacky->result() as $r) {
            $data[] = array($r->idRezervacia,
                $r->datumAcas);
        }

        $output = array("draw" => $draw,
            "recordsTotal" => $rezervacky->num_rows(),
            "recordsFiltered" => $rezervacky->num_rows(),
            "data" => $data);
        echo json_encode($output);
        exit();
    }

    public function  insert() {
        $data['title'] = 'Pridať rezerváciu: ';
        $data['subtitle'] = '';
        $this->load->helper('form');
        $this->load->library('form_validation');


        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');


        $this->form_validation->set_rules('datumAcas','','required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('rezervacia/insert');
            $this->load->view('template/footer');
        } else {
            $data = array(
                'datumAcas' => $this->input->post('datumAcas')
            );
            $this->Rezervacia_model->insert_rezervacia($data);
            $data['message'] = 'Data Inserted Successfully';

            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('home');
            $this->load->view('template/footer');
        }
    }



}
?>