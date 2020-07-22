<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alta extends CI_Controller {
    
    
    /*Controlle de Inicio.
    */
    public function alta(){
            $this->load->model('userdb','',TRUE);
            $notes=$this->userdb->notificaciones($this->session->userdata('id'));
            $this->session->notificaciones=$notes;
            // check if the trabajo exists before trying to edit it
            $this->load->library('form_validation');
    
            $this->form_validation->set_rules('usuarioid','Usuario','required');
            $this->form_validation->set_rules('areaid','Area','required');
    
            if($this->form_validation->run()){
                $this->load->model('trabajosdb','',TRUE);
                $restrabajos = $this->trabajosdb->trabajosrevisados($this->input->post('usuarioid'), $this->input->post('areaid'), $this->input->post('busqueda'));
                $data['listaPublicados'] = json_decode(json_encode($restrabajos), True);
            }  
            //$this->load->model('User_model');
            //$data['all_users'] = $this->User_model->get_all_users();

            $this->load->view('template/header',$data);
            $this->load->view('principal/alta');
            $this->load->view('template/footer');


    }

}
