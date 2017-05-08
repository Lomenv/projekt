<?php

class Jazda extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jazda_model');
        $this->load->helper('url_helper');
        $this->load->database();
        $this->load->library('session');
    }

    public function index()
    {

        $data['jazda'] = $this->Jazda_model->get_jazda();
        $data['title'] = 'jazda';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('jazda/index', $data);
        //$this->load->view('template/footer');

    }

    public function view($id = NULL) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['jazda_item'] = $this->Jazda_model->get_jazda($id);


        if (empty( $data['jazda_item'])) { show_404(); }

        $data['title'] = $data['jazda_item']['idJazda'];
        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('jazda/view', $data);
        $this->load->view('template/footer');
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if(empty($id)) {
            show_404();
        }

        $jazda_item = $this->Jazda_model->get_jazda($id);
        $this->Jazda_model->delete_jazda($id);
        redirect(base_url().'index.php/jazda');

    }
    public function edit() {

        $id = $this->uri->segment(3);

        if(empty($id)) { show_404(); }

        $this->load->helper('form');
        $this->load->library('form_validation');


        $data['jazda_item'] = $this->Jazda_model->get_jazda($id);

        $data['title'] = 'Editovať jazdu: ';



        $this->form_validation->set_rules('idJazda','','required');
        $this->form_validation->set_rules('idRezervacia','','required');
        $this->form_validation->set_rules('idTaxikar','','required');
        $this->form_validation->set_rules('idAuto','','required');
        $this->form_validation->set_rules('telefonNaZakaznika','','required');
        $this->form_validation->set_rules('cena','','required');
        $this->form_validation->set_rules('zaciatok','','required');
        $this->form_validation->set_rules('koniec','','required');
        $this->form_validation->set_rules('typ','','required');
        $this->form_validation->set_rules('dlzkaCesty','','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('jazda/edit', $data);
            $this->load->view('template/footer');
        } else {
            $this->Jazda_model->set_jazda($id);
            redirect(base_url().'index.php/jazda');

        }


    }

    public function jazda_page() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $jazdy = $this->Jazda_model->get_jazda2();
        $data = array();

        foreach ($jazdy->result() as $r) {
            $data[] = array(
                $r->idJazda,
                $r->idRezervacia,
                $r->idTaxikar,
                $r->idAuto,
                $r->telefonNaZakaznika,
                $r->cena,
                $r->zaciatok,
                $r->koniec,
                $r->typ,
                $r->dlzkaCesty);
        }

        $output = array("draw" => $draw,
            "recordsTotal" => $jazdy->num_rows(),
            "recordsFiltered" => $jazdy->num_rows(),
            "data" => $data);
        echo json_encode($output);
        exit();
    }

    public function  insert() {
        $data['title'] = 'Pridať auto: ';
        $data['subtitle'] = '';
        $this->load->helper('form');
        $this->load->library('form_validation');


        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');



        $this->form_validation->set_rules('idRezervacia','','required');
        $this->form_validation->set_rules('idTaxikar','','required');
        $this->form_validation->set_rules('idAuto','','required');
        $this->form_validation->set_rules('telefonNaZakaznika','','required');
        $this->form_validation->set_rules('cena','','required');
        $this->form_validation->set_rules('zaciatok','','required');
        $this->form_validation->set_rules('koniec','','required');
        $this->form_validation->set_rules('typ','','required');
        $this->form_validation->set_rules('dlzkaCesty','','required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('jazda/create');
            $this->load->view('template/footer');
        } else {
            $data = array(
                'idRezervacia' => $this->input->post('idDriver'),
                'idTaxikar' => $this->input->post('idReservation'),
                'idAuto' => $this->input->post('CustomerTelContact'),
                'telefonNaZakaznika' => $this->input->post('Price'),
                'cena' => $this->input->post('PickupLocation'),
                'zaciatok' => $this->input->post('Destination'),
                'koniec' => $this->input->post('Price'),
                'typ' => $this->input->post('PickupLocation'),
                'dlzkaCesty' => $this->input->post('Distance')
            );
            $this->Jazda_model->insert_jazda($data);
            $data['message'] = 'Data Inserted Successfully';

            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('home');
            $this->load->view('template/footer');
        }
    }

}
?>