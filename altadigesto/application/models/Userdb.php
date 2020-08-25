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
Class Userdb extends CI_Model
{

    function login($username, $password)
    {
        date_default_timezone_set('America/Argentina/Cordoba');
        $this->load->database();    
        $this->db->select('id, nombre, email, username, password, nivel, habilitado');
        $this->db->from('users');
        $this->db->where('username = ' . "'" . $username . "'");
        $this->db->where('password = ' . "'" . MD5($password) . "'");
        $this->db->where('habilitado = ' . "'" . 1 . "'");
        $this->db->limit(1);

        $query = $this->db->get();
        $a=$query->result();

        if($query->num_rows() == 1)
        {


            return $query->result();
        }
        else
        {
                return false;
        }
    }
}   