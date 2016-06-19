<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** -
 * 
 * @author Antoine GUILLOT
 * @date 08/06/16
 * @version 4

 Solution temporaire en attendant richard...
 */

class Inscription_temp extends CI_Controller {

    public function envoyer()
    {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $mail = htmlspecialchars($_POST['mail']);
        $civilite = htmlspecialchars($_POST['civilite']);
        $mdp = htmlspecialchars($_POST['mdp']);
        $login = htmlspecialchars($_POST['login']);

        if ($nom!="" and $prenom!="" and $mail!="" and $civilite!="" and $mdp!="" and $login!="")
        {
        	$this->load->model('login');
        	$result = $this->login->valider_userTemp($nom, $prenom, $mail, $civilite, $mdp, $login);

        	if($result==TRUE)
        	{
        		$data=array();
	            $data['code']=10;            
	            $this->session->set_flashdata('code', $data);
	            redirect('accueil/message', 'refresh');
        	}

        	else
        	{
	        	$data=array();
	            $data['code']=9;            
	            $this->session->set_flashdata('code', $data);
	            redirect('accueil/message', 'refresh');
        	}
        }
        else
        {
        	$data=array();
            $data['code']=9;            
            $this->session->set_flashdata('code', $data);
            redirect('accueil/message', 'refresh');
        }

        
    }

}