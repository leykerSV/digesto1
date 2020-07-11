<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
    
    /*Controlle de Inicio.
    */
    public function busqueda()
	{
        $this->load->model('digestodb','',TRUE);
        // check if the trabajo exists before trying to edit it
        $this->load->library('form_validation');

        //$this->form_validation->set_rules('busqueda','Busqueda');
        //$this->form_validation->set_rules('busquedanorma','Busqueda');  

        if((is_null($this->input->post('busqueda'))==false) or (is_null($this->input->post('busquedanorma'))==false)){
            $this->load->model('digestodb','',TRUE);
            if ($this->input->post('busquedanorma')<>""){
                $resnormas = $this->digestodb->busqueda_norma_numero($this->input->post('busquedanorma'));
            }else{
                $resnormas = $this->digestodb->busqueda_norma($this->input->post('busqueda'));
            }
            $data['listaNormas'] = json_decode(json_encode($resnormas), True);
            $data['contador']=count($resnormas);
        }  

        $data['all_tipo'] = $this->digestodb->get_tipo();
        $data['titulo']="Digesto 0.1";
        $data['encabezado']="Digesto Municipal de Santo Tomé -  V. 0.1";
        $data['_view'] = $this->load->view('principal/busqueda', $data, true);
              
        $this->load->view('template/header',$data);
        $this->load->view('principal/main2');
        $this->load->view('template/footer');
    
        
    }  
      
}