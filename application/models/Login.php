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
        $pass = password_hash($pass,PASSWORD_BCRYPT) ;
        $requete = "update utilisateur SET password ='".$pass."' WHERE mail='".$mail."'";
        $this->db->query($requete);
    }

    function login2($username, $password)
    {
        $requete = "select IDuser, login, actif, password from utilisateur WHERE login='".$username."';";
        $result = $this->db->query($requete);
   
        if($result -> num_rows() == 1)
        {
            $result_pass= $result->row(0);
            $result_pass=$result_pass->password;

            if(password_verify($password, $result_pass))
            {
                $result=$result->row(0);
                $data=array('id' => $result->IDuser, 'username' => $result->login, 'actif' => $result->actif);
                return ($data);
            }
            else
            {
                return false;
            }
            
        }
        else
        {
            return false;
        }
    }



}


?>
