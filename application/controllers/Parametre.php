<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** -
 * 
 * @author Antoine GUILLOT
 * @date 08/06/16
 * @version 1
 */

class Parametre extends CI_Controller
{      
    public function c1()
    {
        $this->load->model('login');
        $login = $this->login->recuperer_login();  
        if($login!=FALSE)
        {
        	$data = array();
	        $data['log_or_not'] = $this->login->login1();            
	        $data['url_base'] = base_url();

	        $this->load->view('v_header', $data);           
	        $this->load->view('v_parametre');        
	        $this->load->view('v_footer');  
        }
        else
        {
        	$data['code_erreur']="Veuillez vous connecter avant de pouvoir accéder cette page :'(";
            $data['url_base'] = base_url();
            $data['log_or_not'] = $this->login->login1();
            $this->load->view('v_header', $data);
            $this->load->view('v_message3');
            $this->load->view('v_footer');
        }


          
    }

    public function valider_pass()//A reduire
    {
        $data = array();
        $this->load->model('login');
        $login = $this->login->recuperer_login();  
		$data['url_base'] = base_url();
		$data['log_or_not'] = $this->login->login1();

        if($login!=FALSE)
        {
        	$pass = htmlspecialchars($_POST['pass']);
        	$pass1 = htmlspecialchars($_POST['pass1']);
        	$pass2 = htmlspecialchars($_POST['pass2']);


			if($this->login->login2($login, $pass)!=FALSE)
			{
				if($pass1==$pass2)
	        	{
	        		$this->login->modifier_pass2($pass1, $login);
	        		$data['code_erreur']="Votre MDP a bien été modifié :)";
		            $this->load->view('v_header', $data);
		            $this->load->view('v_message');
		            $this->load->view('v_footer');
	        	}
	        	else
	        	{
	        		$data['code_erreur']="Les deux MDPs ne sont pas identiques :'(";
		            $this->load->view('v_header', $data);
		            $this->load->view('v_message2');
		            $this->load->view('v_footer');
	        	}
			}

        	else
        	{
        		$data['code_erreur']="MDP incorrect :'(";
	            $this->load->view('v_header', $data);
	            $this->load->view('v_message2');
	            $this->load->view('v_footer');
        	}   	
        }
        else
        {
            $data['code_erreur']="Veuillez vous connecter avant d'accéder à cette page :'(";
            $this->load->view('v_header', $data);
            $this->load->view('v_message');
            $this->load->view('v_footer');
        }         
    }

    public function valider_mail()
    {
        $data = array();
        $this->load->model('login');
        $login = $this->login->recuperer_login();  
		$data['url_base'] = base_url();
		$data['log_or_not'] = $this->login->login1();

        if($login!=FALSE)
        {
        	$pass = htmlspecialchars($_POST['pass']);
        	$mail = htmlspecialchars($_POST['mail']);


			if($this->login->login2($login, $pass)!=FALSE)
			{
        		$this->login->modifier_mail($mail, $login);
        		$data['code_erreur']="Votre mail a bien été modifié :)";
	            $this->load->view('v_header', $data);
	            $this->load->view('v_message');
	            $this->load->view('v_footer');	        	
			}

        	else
        	{
        		$data['code_erreur']="MDP incorrect :'(";
	            $this->load->view('v_header', $data);
	            $this->load->view('v_message2');
	            $this->load->view('v_footer');
        	}   	
        }
        else
        {
            $data['code_erreur']="Veuillez vous connecter avant d'accéder à cette page :'(";
            $this->load->view('v_header', $data);
            $this->load->view('v_message');
            $this->load->view('v_footer');
        }           
        
    }


   
}