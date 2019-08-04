<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 
 * User: Glory

 */
class Lowongan extends CI_Controller
{

    var $userSession;
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('The_Model');

        $this->userSession = $this->session->userdata();

        $hakAkses = $this->userSession['hak_akses'];
        
       
        if($hakAkses != "") {

        }else {
            redirect("Login");
        }
    }

    function index(){
        $data['lowongan']     = $this->The_Model->getDataLowongan()->result();
     
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar');
        $this->load->view('lowongan/data_lowongan',$data);
        $this->load->view('parts/footer');
    }

    function simpanLowongan(){
        $data = $_POST;
        $foto = $_FILES['foto'];
        
        $this->The_Model->saveLowongan($data,$foto);
    }

    function hapusLowongan(){
        $id =  $this->input->post('id_lowongan');

        $this->The_Model->deleteLowongan($id);
    }

    function ubahLowongan(){
        $data = $_POST;
        $foto = $_FILES['foto'];

       if($foto['name'] == null || $foto['name'] == ""){
           $foto = null;
       }
       
       $this->The_Model->updateLowongan($data,$foto);
    }

}