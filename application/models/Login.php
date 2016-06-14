<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/** -
 * 
 * @author Antoine GUILLOT
 * @date 08/06/16
 * @version 1
 */

Class Login extends CI_Model {

    function login1() 
    {
    	$sess_array=$this->session->userdata('logged_in');
    	$data = array();
		if($sess_array['username']!=NULL)
            {
                $data['log_or_not']='<a href="'.  base_url() .'accueil/logout">Se déconnecter</a></li>';
            }
        else 
            {
                $data['log_or_not']='Se connecter';
            }

        return $data['log_or_not'];
    }

    function modifier_pass($pass, $mail)
    {
      $requete = "update utilisateur SET password = MD5('".$pass."') WHERE mail='".$mail."'";
      $this->db->query($requete);
    }

    function login2($username, $password)
    {
        $requete = "select IDuser, login, actif from utilisateur WHERE login='".$username."' and password='".MD5($password)."'";
        $result = $this->db->query($requete);
   
        if($result -> num_rows() == 1)
        {
            return $result->result();
        }
        else
        {
            return false;
        }
    }



}


?>
