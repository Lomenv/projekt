<?php

class Vozidla extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vozidla_model');
        $this->load->helper('url_helper');
        $this->load->database();
        $this->load->library('session');
    }



    public function index()
    {

        $data['vozidla'] = $this->Vozidla_model->get_vozidla();
        $data['title'] = 'Vozidla';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('vozidla/index', $data);


    }

    public function view($id = NULL) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['vozidla_item'] = $this->Vozidla_model->get_vozidla($id);


        if (empty( $data['vozidla_item'])) { show_404(); }

        $data['title'] = $data['vozidla_item']['idVozidla'];
        $data['subtitle'] = $data['vozidla_item']['znacka'] . ' ' .  $data['vozidla_item'] ['model'];
        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('vozidla/view', $data);
        $this->load->view('template/footer');
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if(empty($id)) {
            show_404();
        }

        $vozidla_item = $this->Vozidla_model->get_vozidla($id);
        $this->Vozidla_model->delete_vozidla($id);
        redirect(base_url().'index.php/vozidla');

    }
    public function edit() {

        $id = $this->uri->segment(3);

        if(empty($id)) { show_404(); }

        $this->load->helper('form');
        $this->load->library('form_validation');


        $data['vozidla_item'] = $this->Vozidla_model->get_vozidla($id);

        $data['title'] = 'Edit vozidla: ';
        $data['subtitle'] = $data['vozidla_item']['znacka'] . ' ' .  $data['vozidla_item'] ['model'];


        $this->form_validation->set_rules('idAuto','','required');
        $this->form_validation->set_rules('znacka','','required');
        $this->form_validation->set_rules('model','model','required');
        $this->form_validation->set_rules('pocetMiest','pocetMiest','required');
        $this->form_validation->set_rules('SPZ','SPZ','required');
        $this->form_validation->set_rules('farba','farba','required');
        $this->form_validation->set_rules('dostupnost','dostupnost','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('vozidla/edit', $data);
            $this->load->view('template/footer');
        } else {
            $this->Vozidla_model->set_vozidla($id);
            redirect(base_url().'index.php/vozidla');

        }


    }

    public function  insert() {
        $data['title'] = 'Add vehicle: ';
        $data['subtitle'] = '';
        $this->load->helper('form');
        $this->load->library('form_validation');


        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->form_validation->set_rules('znacka','','required');
        $this->form_validation->set_rules('model','model','required');
        $this->form_validation->set_rules('pocetMiest','pocetMiest','required');
        $this->form_validation->set_rules('SPZ','SPZ','required');
        $this->form_validation->set_rules('farba','farba','required');
        $this->form_validation->set_rules('dostupnost','dostupnost','required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('vozidla/create');
            $this->load->view('template/footer');
        } else {
            $data = array(
                'znacka' => $this->input->post('znacka'),
                'model' => $this->input->post('model'),
                'SPZ' => $this->input->post('SPZ'),
                'dostupnost' => $this->input->post('dostupnost')
            );
            $this->Vozidla_model->insert_vozidla($data);
            $data['message'] = 'Data Inserted Successfully';

            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('home');
            $this->load->view('template/footer');
        }
    }




    public function vozidla_page() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $vozidla = $this->Vozidla_model->get_vozidla2();
        $data = array();

        foreach ($vozidla->result() as $r) {
            $data[] = array($r->idAuto,
                $r->znacka,
                $r->model,
                $r->pocetMiest,
                $r->SPZ,
                $r->farba,
                $r->dostupnost);
        }

        $output = array("draw" => $draw,
            "recordsTotal" => $vozidla->num_rows(),
            "recordsFiltered" => $vozidla->num_rows(),
            "data" => $data);
        echo json_encode($output);
        exit();
    }



}
?>
}
