<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class Pouzivatelia extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Pouzivatelia_model');
    }


    public function konto(){
        $data = array();
        if($this->session->userdata('isUserLoggedIn')){
            $data['pouzivatel'] = $this->Pouzivatelia_model->getRows(array('id'=>$this->session->userdata('userId')));
            //load the view
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('pouzivatelia/konto', $data);
        }else{

            redirect('pouzivatelia/prihlasenie');
        }
    }


    public function prihlasenie(){
        $data = array();
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        if($this->input->post('loginSubmit')){
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'email'=>$this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'status' => '1'
                );
                $checkLogin = $this->Pouzivatelia_model->getRows($con);
                if($checkLogin){
                    $this->session->set_userdata('isUserLoggedIn',TRUE);
                    $this->session->set_userdata('userId',$checkLogin['id']);
                    redirect('pouzivatelia/konto/');
                }else{
                    $data['error_msg'] = 'Zlý email, alebo heslo. Skúste znova.';
                }
            }
        }
       // $this->load->view('template/header', $data);
        //$this->load->view('template/navigation');
        $this->load->view('pouzivatelia/prihlasenie', $data);
       // $this->load->view('template/footer' );

    }


    public function registraciadf56g4df64gfd64g6df4g6d4g6df4g()
    {
        $data = array();
        $userData = array();
        if ($this->input->post('regisSubmit')) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');

            $userData = array(
                'name' => strip_tags($this->input->post('name')),
                'email' => strip_tags($this->input->post('email')),
                'password' => md5($this->input->post('password')),
            );

            if ($this->form_validation->run() == true) {
                $insert = $this->Pouzivatelia_model->insert($userData);
                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Registrácia prebehla.');
                    redirect('pouzivatelia/prihlasenie');
                } else {
                    $data['error_msg'] = 'Vyskytli sa problémy. Skúste znova';
                }
            }
        }
        $data['pouzivatel'] = $userData;
        //load the view

        $this->load->view('pouzivatelia/registracia', $data);

    }



    public function odhlasenie(){
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect('home');
    }


    public function email_check($str){
        $con['returnType'] = 'count';
        $con['conditions'] = array('email'=>$str);
        $checkEmail = $this->Pouzivatelia_model->getRows($con);
        if($checkEmail > 0){
            $this->form_validation->set_message('email_check', 'Email už existuje');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}