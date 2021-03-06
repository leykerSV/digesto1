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
    * Busca Normas.
    * 
    * 
    * @author Leyker
    * @param string $username Nombre del Usuario.
    * @param string $password Pass del usuario.  
    * @return boolean Devuelve True si los datos son correctos.
    */
    function busqueda_norma($texto,$tipo,$desde,$hasta)
    {  
        $this->load->database();       
        $this->db->select('*');
        $this->db->from('Normas');
        $this->db->like('contenido', $texto); 
        #$this->db->where('contenido like ' . "'%" . $texto . "%'");
        if(!is_null($tipo)){
            foreach ($tipo as $opcion) {
                $this->db->where('tipo = '.$opcion);    
            }
        }
        
        if ($desde<>'' and $hasta<>''){
            $desde=date($desde.'-01-'.'01',strtotime($desde));
            $hasta=date($hasta.'-12-'.'31',strtotime($hasta));
            $a='fechapromulgacion between "'.$desde.'" and "'.$hasta.'"';
            $this->db->where($a);
        }
        $this->db->order_by('fechapromulgacion', 'DESC');
        $query = $this->db->get();
        $a=$query->result();
        return $query->result();
    }

        /**
    * Busca Normas.
    * 
    * 
    * @author Leyker
    * @param string $username Nombre del Usuario.
    * @param string $password Pass del usuario.  
    * @return boolean Devuelve True si los datos son correctos.
    */
    function busqueda_norma_numero($texto,$tipo,$desde,$hasta)
    {  
        $this->load->database();       
        $this->db->select('*');
        $this->db->from('Normas');
        $this->db->where('numero = '.$texto);
        if(!is_null($tipo)){
            foreach ($tipo as $opcion) {
                $this->db->where('tipo = '.$opcion);    
            }
        }

        if ($desde<>'' and $hasta<>''){
            $desde=date($desde.'-01-'.'01',strtotime($desde));
            $hasta=date($hasta.'-12-'.'31',strtotime($hasta));
            $a='fechapromulgacion between "'.$desde.'" and "'.$hasta.'"';
            $this->db->where($a);
        }
        $this->db->order_by('fechapromulgacion', 'DESC');
        $query = $this->db->get();
        $a=$query->result();
        return $query->result();
    }

    function devuelve_norma($norma,$tipo){
        $this->load->database();       
        $sql = "call Devuelvenorma(".$norma.", ".$tipo.")";
        $query=$this->db->query($sql);
        $a=$query->result();
        $query->free_result();
        $query->next_result();
        return $query->result();
    }

    function busqueda_relaciones($norma,$tipo){
        $this->load->database();
        $sql = "call Relaciones(".$norma.", ".$tipo.")";
        $query=$this->db->query($sql);
        $a=$query->result();
        $query->free_result();
        $query->next_result();
        return $query->result();
    }
    
    function busqueda_relacionesinversas($norma,$tipo){
        $this->load->database();
        $sql = "call Relacionesinversa(".$norma.", ".$tipo.")";
        $query=$this->db->query($sql);
        $a=$query->result();
        $query->free_result();
        $query->next_result();
        return $query->result();
    }

    function devuelve_estructuratematica($norma,$tipo){
        $this->load->database();
        $sql = "call Estructuratematica(".$norma.", ".$tipo.")";
        $query=$this->db->query($sql);
        $a=$query->result();
        $query->free_result();
        $query->next_result();
        return $query->result();
    }

    function nuevo($registro){
        $this->load->database(); 
        
        return $this->db->insert('Normas', $registro);
    }
}
