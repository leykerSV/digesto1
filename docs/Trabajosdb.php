<?php
  /**
  * Modulo de Usarios.
  *
  * 
  * @package     geasoft/Modulos
  * @copyright   Copyright (c) Leyker Soft - 2016
  * @license     https://www.leyker.com.ar/eb/licencia.txt
  * @version     1.0.0
  * @author      Leyker <dleyendeker@gmail.com>
  *
  * @Date 25-16-2016
  *
  */
Class Trabajosdb extends CI_Model
{
    /**
    * Carga los trabajos del Usuario.
    * 
    * 
    * @author Leyker
    * @param string $username Nombre del Usuario.
    * @param string $password Pass del usuario.  
    * @return boolean Devuelve True si los datos son correctos.
    */
    function trabajos($id, $estado)
    {  
        $this->load->database();       
        $this->db->select('*');
        $this->db->from('trabajos');
        $this->db->where('usuarioid = ' . "'" . $id . "'");
        $this->db->where('estado = ' . "'" . $estado . "'");
        $this->db->where('cancelado = 0');
        $this->db->order_by('fechaEntrega');
        $query = $this->db->get();
        $a=$query->result();
        return $query->result();
    }

    function admin_trabajos($estado)
    {  
        $this->load->database();       
        $this->db->select('*');
        $this->db->from('trabajos');
        $this->db->where('estado = ' . "'" . $estado . "'");
        $this->db->where('cancelado = 0');
        $this->db->order_by('fechaEntrega');
        $query = $this->db->get();
        return $query->result();
    }

    function trabajospublicados($id, $area, $busca, $depto)
    {  
        $this->load->database();  
        $estado='PUBLICADO';     
        $this->db->select('*');
        $this->db->from('trabajos');
        if ($id<>"0"){
          $this->db->where('usuarioid = ' . "'" . $id . "'");
        }
        if ($area<>"0"){
          $this->db->where('idarea = ' . "'" . $area . "'");
        }
        if ($depto<>"0" and $depto<>null){
          $this->db->where('iddepto = ' . "'" . $depto . "'");
        }

        $this->db->where('estado = ' . "'" . $estado . "'");
        $this->db->where('cancelado = 0');
        $this->db->where('fechavigencia <  CURDATE()+1');
        //$this->db->where('fechavigencia >  date_sub(CURDATE(), INTERVAL 1 DAY)');
        $this->db->where('CURDATE() < finfechavigencia');
        //$this->db->where('DATE(CURDATE()) between DATE(fechavigencia) and DATE(finfechavigencia)');
        If ($busca<>''){
          //$this->db->where('titulo like ' . "'%" . $busca . "%'");
          $a=$this->db->like('titulo', $busca);
        }
        $this->db->order_by('fechaEntrega','desc');
        $query = $this->db->get();
        return $query->result();
    }


    function trabajosrevisados($id, $area, $busca)
    {  
        $this->load->database();  
        $estado='PUBLICADO';     
        $this->db->select('*');
        $this->db->from('trabajos_version');
        if ($id<>"0"){
          $this->db->where('usuarioid = ' . "'" . $id . "'");
        }
        if ($area<>"0"){
          $this->db->where('idarea = ' . "'" . $area . "'");
        }

        $this->db->where('estado = ' . "'" . $estado . "'");
        $this->db->where('cancelado = 0');
        If ($busca<>''){
          //$this->db->where('titulo like ' . "'%" . $busca . "%'");
          $a=$this->db->like('titulo', $busca);
        }
        $this->db->order_by('idtrabajo','desc');
        $this->db->order_by('revision','asc');
        $query = $this->db->get();
        return $query->result();
    }

    function trabajoshistoricos($id, $area)
    {  
        $this->load->database();  
        $estado='PUBLICADO';     
        $this->db->select('*');
        $this->db->from('trabajos');
        if ($id<>"0"){
          $this->db->where('usuarioid = ' . "'" . $id . "'");
        }
        if ($area<>"0"){
          $this->db->where('idarea = ' . "'" . $area . "'");
        }
        $this->db->where('estado = ' . "'" . $estado . "'");
        $this->db->where('cancelado = 0');
        $this->db->where('finfechavigencia <=  CURDATE()');
        $this->db->order_by('fechaEntrega','desc');
        $query = $this->db->get();
        $a=$query->result();
        return $query->result();
    }

    function trabajoscancelados($id, $area)
    {  
        $this->load->database();  
 
        $this->db->select('*');
        $this->db->from('trabajos');
        if ($id<>"0"){
          $this->db->where('usuarioid = ' . "'" . $id . "'");
        }
        if ($area<>"0"){
          $this->db->where('idarea = ' . "'" . $area . "'");
        }
        $this->db->where('cancelado <> 0');
        $this->db->order_by('fechaEntrega','desc');
        $query = $this->db->get();
        $a=$query->result();
        return $query->result();
    }
  
}    
