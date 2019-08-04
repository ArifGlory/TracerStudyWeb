<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 22/11/2018
 * Time: 13:51
 */
class The_Model extends CI_Model
{
    var $tb_materi    = "tb_materi";
    var $tb_alumni    = "tb_alumni";
    var $fotoPath;

    function __construct(){
        parent::__construct();
        $this->fotoPath =  realpath(APPPATH.'../foto/lowongan');    
    }

    function get_materi(){
        $data = $this->db->get($this->tb_materi);
        return $data;
    }

    function signInAdmin($data){
        $username = $data ['username'];
        $password = $data ['password'];
       
        $q = $this->db->query("SELECT * FROM `tb_admin` WHERE `username` = '$username' AND `password` = '$password' ");

      

        if(count($q->result()) > 0){
           
            $admin = $q->result_array()[0];
            //print_r($admin['nama']);
           
            $user = array(
                'hak_akses' => "true",
                'nama'      => $admin['nama'],
                'id'        => $admin['id_admin']
            );

            $this->session->set_userdata($user);
            $response['status']     = "success";
            $response['message']    = "Login berhasil";
            $response['redirect']   = "Utama";
            
            $response = json_encode($response);
            echo $response;

        }else{
            $response['status']     = "error";
            $response['message']    = "Login gagal, periksa kembali username / password anda";

            $response = json_encode($response);
            echo $response;
        }
    }

    function getDataAlumniLimit($limit){
        $this->db->limit($limit);
        $data = $this->db->get($this->tb_alumni);
        return $data;
    }

    function getDataAlumni(){
        // $data = $this->db->get($this->tb_alumni);
        // return $data;
        $q = $this->db->query("SELECT * FROM tb_alumni 
        INNER JOIN tb_jurusan 
            ON (tb_alumni.id_jurusan = tb_jurusan.id_jurusan)
            WHERE tb_alumni.id_jurusan = tb_jurusan.id_jurusan
            ORDER BY tb_alumni.id_jurusan DESC");

        return $q;
    }

    function getSingleAlumni($id){
        $this->db->from($this->tb_alumni);
        $this->db->where('id_alumni',$id);
        $query = $this->db->get();
        return $query;
    }

    function getDataJurusan(){
        $data = $this->db->get('tb_jurusan');
        return $data;
    }

    function getDataLowongan(){
        $data = $this->db->get('tb_lowongan');
        return $data;
    }

    function saveAlumni($data){
        $query =  $this->db->insert('tb_alumni',$data);
        
        if($query){
            $response['status']     = "success";
            $response['message']    = "Data berhasil disimpan";
            $response['redirect']   = "Alumni";
            
            $response = json_encode($response);
            echo $response;
        }else{
            $response['status']     = "error";
            $response['message']    = "Terjadi kesalahan, coba lagi nanti";

            $response = json_encode($response);
            echo $response;
        }
    }

    function saveLowongan($data,$foto){

      
        $target_dir = "foto/lowongan/";
        $imgType    = substr($foto['type'],strpos( $foto['type'],"/") + 1);
        $nmfile     = "file_".time() . "." . $imgType;
        $targetFile = $target_dir . $nmfile;
        $uploaded   = move_uploaded_file($foto['tmp_name'],$targetFile); 

        $data['foto']   = $nmfile;
        $redirect       =  base_url()."Lowongan";


        if($uploaded){
            $query =  $this->db->insert('tb_lowongan',$data);

            if($query){
                $response['status']     = "success";
                $response['message']    = "Data berhasil disimpan";
                $response['redirect']   = $redirect;
                
                $response = json_encode($response);
                echo $response;
            }else{
                $response['status']     = "error";
                $response['message']    = "Gagal menyimpan, coba lagi nanti";
    
                $response = json_encode($response);
                echo $response;
            }
        }else{
            $response['status']     = "error";
            $response['message']    = "Upload gagal, coba lagi nanti";

            $response = json_encode($response);
            echo $response;
        }
    }

    function updateLowongan($data,$foto){
        $redirect       =  base_url()."Lowongan";
        if($foto == null){
            //ubah datanya saja
            if(isset($data['foto'])){
                unset($data['foto']);
            }
            
            $id_lowongan = $data['id_lowongan'];
            $this->db->where('id_lowongan',$id_lowongan);
            $query =  $this->db->update("tb_lowongan",$data);
            if($query){
                $response['status']     = "success";
                $response['message']    = "Data berhasil diubah";
                $response['redirect']   = $redirect;
                
                $response = json_encode($response);
                echo $response;
            }else{
                $response['status']     = "error";
                $response['message']    = "Gagal menyimpan, coba lagi nanti";
    
                $response = json_encode($response);
                echo $response;
            }

        }else{
            //upload foto baru
            $target_dir = "foto/lowongan/";
            $imgType    = substr($foto['type'],strpos( $foto['type'],"/") + 1);
            $nmfile     = "file_".time() . "." . $imgType;
            $targetFile = $target_dir . $nmfile;
            $uploaded   = move_uploaded_file($foto['tmp_name'],$targetFile); 
            $data['foto']   = $nmfile;
            $id_lowongan = $data['id_lowongan'];

            if($uploaded){
                $this->db->where('id_lowongan',$id_lowongan);
                $query =  $this->db->update("tb_lowongan",$data);
    
                if($query){
                    $response['status']     = "success";
                    $response['message']    = "Data berhasil diubah";
                    $response['redirect']   = $redirect;
                    
                    $response = json_encode($response);
                    echo $response;
                }else{
                    $response['status']     = "error";
                    $response['message']    = "Gagal menyimpan, coba lagi nanti";
        
                    $response = json_encode($response);
                    echo $response;
                }
            }else{
                $response['status']     = "error";
                $response['message']    = "Upload gagal, coba lagi nanti";
    
                $response = json_encode($response);
                echo $response;
            }
           


        }
    }

    function deleteLowongan($id){
        $this->db->where('id_lowongan',$id);
        $query = $this->db->delete('tb_lowongan');
        $redirect =  base_url()."Lowongan";

        if($query){
            $response['status']     = "success";
            $response['message']    = "Data berhasil dihapus";
            $response['redirect']   = $redirect;
            
            $response = json_encode($response);
            echo $response;
        }else{
            $response['status']     = "error";
            $response['message']    = "Terjadi kesalahan, coba lagi nanti";

            $response = json_encode($response);
            echo $response;
        }
    }

    function deleteAlumni($id){
        $this->db->where('id_alumni',$id);
        $query = $this->db->delete('tb_alumni');
        $redirect =  base_url()."Alumni";
        if($query){
            $response['status']     = "success";
            $response['message']    = "Data berhasil dihapus";
            $response['redirect']   = $redirect;
            
            $response = json_encode($response);
            echo $response;
        }else{
            $response['status']     = "error";
            $response['message']    = "Terjadi kesalahan, coba lagi nanti";

            $response = json_encode($response);
            echo $response;
        }
    }
}