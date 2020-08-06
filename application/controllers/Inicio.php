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
        $uno=$this->input->post('busqueda');
        $dos=$this->input->post('busquedanorma');
        $desde=$this->input->post('fechadesde');
        $hasta=$this->input->post('fechahasta');

        if(($uno<>null) or ($uno<>"") or ($dos<>null) or ($dos<>"")){
            if(!empty($_POST['tipo_norma'])){
                // Ciclo para mostrar las casillas checked checkbox.
                foreach($_POST['tipo_norma'] as $selected){
                    $tipo[]=$selected;
                }
            }else{
                $tipo=null;
            }
            $this->load->model('digestodb','',TRUE);
            if ($this->input->post('busquedanorma')<>""){
                $resnormas = $this->digestodb->busqueda_norma_numero($this->input->post('busquedanorma'),$tipo,$desde,$hasta);    
            }else{
                $resnormas = $this->digestodb->busqueda_norma($this->input->post('busqueda'),$tipo,$desde,$hasta);
            }
            $data['listaNormas'] = json_decode(json_encode($resnormas), True);
            $data['contador']=count($resnormas);
        }  

        $data['all_tipo'] = $this->digestodb->get_tipo();
        $data['titulo']="Digesto 0.1";
        $data['encabezado']="Digesto Municipal de Santo Tomé -  V. 0.1";
        $data['_view'] = $this->load->view('principal/busqueda', $data, true);
              
        $this->load->view('template/header',$data);
        $this->load->view('principal/main');
        $this->load->view('template/footer');
    
        
    }  

    public function alta(){
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('numero','Numero de Norma','required|numeric');
        #$this->form_validation->set_rules('areaid','Area','required');
    
        if($this->form_validation->run()){              
            $data = array(
                'tipo' => $this->input->post('tipo_norma'),
                'numero' => $this->input->post('numero'),
                'expedientechm' => $this->input->post('expedientechm'),
                'fechasancion' => $this->input->post('fechasancion'),
                'expedientedem' => $this->input->post('expedientedem'),
                'fechapromulgacion' => $this->input->post('fechapromulgacion'),
                'origen' => $this->input->post('origen'),
                'autor' => $this->input->post('autor'),
                'contenido' => $this->input->post('contenido'),
                'observaciones' => $this->input->post('observaciones'),
                'caracter' => $this->input->post('caracter'),
                'alcance' => $this->input->post('alcance'),
                'archivo' => $this->input->post('archivo'),
                'archivoord' => $this->input->post('archivoord'),
                'nrocaja' => $this->input->post('nrocaja'),
                'nroorden' => $this->input->post('nroorden')
            );
            #Falta Estructura tematica 1 y 2
            #Falta Descriptores
        }  
        $this->load->model('digestodb','',TRUE);
        $data['all_tipo'] = $this->digestodb->get_tipo();
        $this->load->view('template/header',$data);
        $this->load->view('principal/alta');
        $this->load->view('template/footer');
    }

    public function detalles($norma,$tipo){
        $this->load->model('digestodb','',TRUE);
        $relaciones = $this->digestodb->busqueda_relaciones($norma,$tipo); 
        $relacionesinv = $this->digestodb->busqueda_relacionesinversas($norma,$tipo);     
        $norma_v = $this->digestodb->devuelve_norma($norma,$tipo);
        $estructuratematica=$this->digestodb->devuelve_estructuratematica($norma,$tipo);
        $data['relaciones'] = json_decode(json_encode($relaciones), True);
        $data['relacionesinversas'] = json_decode(json_encode($relacionesinv), True);
        $data['norma'] = json_decode(json_encode($norma_v), True);
        $data['estructuratematica'] = json_decode(json_encode($estructuratematica), True);
        $this->load->view('template/header',$data);
        $this->load->view('principal/detalles');
        $this->load->view('template/footer');
    }

}