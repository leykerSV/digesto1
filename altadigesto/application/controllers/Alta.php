<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alta extends CI_Controller {
    
    
    public function index()       
    {
        $this->session->unset_userdata('userdata');
		$this->load->view('template/header');
		$this->load->view('template/login');
		$this->load->view('template/footer');
    }
		
    /**
    * Logue al Usuario.
    * 
    * Llama a la funcion check_database 
    * 
    * @author Leyker
    * @return boolean true si es correcto
    */
    public function verifylogin()
    {
        if($this->check_database() == TRUE)
        {
          redirect('menuabm', 'refresh');

        }else{
          $this->session->set_flashdata('error_msg', 'Error al loguearse. Verifique los datos.');
          redirect(base_url(), 'refresh');
        }
    }
        
    
    /**
    * Chequea en la BBDD.
    * 
    * Control los datos del usuario
		* 
		
    * @author Leyker
    * @param string $password La clave del usuario 
    * @return boolean true si es correcto
    */
    function check_database()
    {
      $this->load->model('userdb','',TRUE); 
      //Field validation succeeded.  Validate against database
      $username = $this->input->post('username');
      $password=$this->input->post('password');
      //query the database
      $result = $this->userdb->login($username, $password);

      if($result)
      {
        $sess_array = array();
        $this->load->model('userdb',true);
        foreach($result as $row)
        {
         $sess_array = array(
            'id' => $row->id,
            'nombrecompleto' => $row->nombre,
            'email' => $row->email,
            'username' => $row->username,
            'nivel'=> $row->nivel,
						'habilitado'=> $row->habilitado,
						'email'=> $row->email,
            'logueado'=>TRUE
          );
          $this->session->set_userdata($sess_array);
        }
        return TRUE;
      }
      else
      {
        $this->session->unset_userdata('userdata');
        return FALSE;
      }
    }

    public function menuabm()       
    {
      $this->check_log();
		  $this->load->view('template/header');
		  $this->load->view('principal/menuabm');
		  $this->load->view('template/footer');
    }

    /**
    * Chequea que la sesión esté iniciada
    * Usarla antes de ejecutar un método de un controller
    * 
    * @author Leyker
    */
    private function check_log(){
        if($this->session->userdata('logueado') == FALSE){
            redirect(base_url(), 'refresh');    
        }
    }

    /*Controlle de Inicio.
    */
    public function nuevo(){
      $this-> check_log();
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
  
      if($this->form_validation->run())
      {     
        var_dum($this->input->post('tipo_norma'));
        die;
        $nuevoregistro = array(
          'tipo' => 1,//hm' => $this->input->post('tipo_norma'),
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
          $this->load->model('digestodb','',TRUE);
          $this->digestodb->nuevo($nuevoregistro);

          redirect('user/index');
          #Falta Estructura tematica 1 y 2
          #Falta Descriptores
      }else{

        $this->load->model('digestodb','',TRUE);
        $data['all_tipo'] = $this->digestodb->get_tipo();
        $data['_view'] = $this->load->view('principal/alta', $data, true);
              
        $this->load->view('template/header',$data);
        $this->load->view('principal/main2');
        $this->load->view('template/footer');
      }
    }

}
