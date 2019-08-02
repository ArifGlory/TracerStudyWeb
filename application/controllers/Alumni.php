<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 
 * User: Glory

 */
class Alumni extends CI_Controller
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
       
      
        $data['alumni']     = $this->The_Model->getDataAlumni()->result();
        $data['jurusan']    = $this->The_Model->getDataJurusan()->result(); 
     
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar');
        $this->load->view('alumni/data_alumni',$data);
        $this->load->view('parts/footer');
    }

    function profil($id){
        $data['alumni']     = $this->The_Model->getSingleAlumni($id)->result_array();

        $this->load->view('parts/header');
        $this->load->view('parts/sidebar');
        $this->load->view('alumni/profil_alumni',$data);
        $this->load->view('parts/footer');
    }

    function simpanAlumni(){
        $data['nis']            = $this->input->post('nis');
        $data['nisn']           = $this->input->post('nisn');
        $data['nama_alumni']    = $this->input->post('nama');
        $data['tahun_lulus']    = $this->input->post('thn_lulus');
        $data['no_hape']        = $this->input->post('nope');
        $data['email']          = $this->input->post('email');
        $data['id_jurusan']     = $this->input->post('jurusan');
        $data['pekerjaan']      = $this->input->post('pekerjaan');
        $data['password']       = $this->input->post('pass');
        $data['alamat']         = $this->input->post('alamat');

        $this->The_Model->saveAlumni($data);
    }

    function hapusAlumni(){
        $id = $this->input->post('id');
        $this->The_Model->deleteAlumni($id);
    }



}