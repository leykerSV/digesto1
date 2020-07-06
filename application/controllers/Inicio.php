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

        $this->form_validation->set_rules('busqueda','Busqueda','required');  
 
        if($this->form_validation->run()){
            $this->load->model('digestodb','',TRUE);
            $resnormas = $this->digestodb->busqueda_norma($this->input->post('busqueda'));
            $data['listaNormas'] = json_decode(json_encode($resnormas), True);
        }  

        $data['all_tipo'] = $this->digestodb->get_tipo();
        $data['titulo']="Digesto 0.1";
        $data['encabezado']="Digesto Municipal de Santo Tomé";
        $data['_view'] = $this->load->view('principal/busqueda', $data, true);
              
        $this->load->view('template/header',$data);
        $this->load->view('principal/main2');
        $this->load->view('template/footer');
    
        
    }  
      
}