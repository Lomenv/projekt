<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Graf extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Graf_model');

        // $this->load->library('form_validation');

        $this->load->helper('string');
        $this->load->library('session');

    }

    public

    function index()
    {
        $this->load->view('template/header.php');
        $this->load->view('template/navigation.php');
        $this->load->view('grafy/graf.php');
    }

    public

    function getdata()
    {
        $response = "";
        $data = $this->Graf_model->get_jazdy();


        //         //data to json

        $response->cols[] = array(
            "id" => "",
            "label" => "id Jazdy",
            "pattern" => "",
            "type" => "string"
        );
        $response->cols[] = array(
            "id" => "",
            "label" => "Cena",
            "pattern" => "",
            "type" => "number"
        );
        foreach($data as $cd)
        {
            $response->rows[]["c"] = array(
                array(
                    "v" => "Jazda " . "$cd->idJazda",
                    "f" => null
                ) ,
                array(
                    "v" => (int)$cd->cena,
                    "f" => null
                )
            );
        }

        echo json_encode($response);
    }


    function getdata2()
    {
        $response = "";
        $data = $this->Graf_model->get_auto();


        //         //data to json

        $response->cols[] = array(
            "id" => "",
            "label" => "id Auto",
            "pattern" => "",
            "type" => "string"
        );
        $response->cols[] = array(
            "id" => "",
            "label" => "Počet miest",
            "pattern" => "",
            "type" => "number"
        );
        foreach($data as $cd)
        {
            $response->rows[]["c"] = array(
                array(
                    "v" => "$cd->znacka" . " " . "$cd->model",
                    "f" => null
                ) ,
                array(
                    "v" => (int)$cd->pocetMiest,
                    "f" => null
                )
            );
        }

        echo json_encode($response);
    }
}