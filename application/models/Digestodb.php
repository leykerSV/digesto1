<?php
  /**
  * Modulo de Usarios.
  *
  * 
  * @package     digesto1/models
  * @license     GPL
  * @version     1.0.0
  * @author      Leyker <dleyendeker@gmail.com>
  *
  * @Date 01/07/2020
  *
  */
Class Digestodb extends CI_Model
{
    
    
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get user by id
     */
    function get_tipo()
    {
        //return $this->db->get_where('Tiposdenormas',array('codigo'=>$id))->row_array();
        $this->load->database();       
        $this->db->select('*');
        $this->db->from('Tiposdenormas');
        $query = $this->db->get();
        $a=$query->result();
        return $query->result();
    }


    /**
    * Carga los trabajos del Usuario.
    * 
    * 
    * @author Leyker
    * @param string $username Nombre del Usuario.
    * @param string $password Pass del usuario.  
    * @return boolean Devuelve True si los datos son correctos.
    */
    function busqueda_norma($texto)
    {  
        $this->load->database();       
        $this->db->select('*');
        $this->db->from('Normas');
        $this->db->where('contenido like ' . "'%" . $texto . "%'");
        $this->db->order_by('fechapromulgacion');
        $query = $this->db->get();
        $a=$query->result();
        return $query->result();
    }
}
