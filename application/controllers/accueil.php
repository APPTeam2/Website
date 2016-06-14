<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** -
 * 
 * @author Antoine GUILLOT
 * @date 08/06/16
 * @version 1
 */

class Accueil extends CI_Controller {
    
	public function index()
	{       
                $sess_array=$this->session->userdata('logged_in');
                $data = array();
                if($sess_array['username']!=NULL)
                {
                    $data['log_or_not']='<a href="'.  base_url() .'accueil/logout">Se déconnecter</a></li>';

                    if($sess_array['actif']==1)
                    {
                        $data['url_base'] = base_url(); 
                        $this->load->view('v_header', $data);
                        $this->load->view('v_acceuil_section', $data);
                        $this->load->view('v_sponsors');
                        $this->load->view('v_footer');
                    }
                    else
                    {
                        redirect('accueil/confirmation1', 'refresh'); 
                    }
                }
                else 
                {
                    $data['log_or_not']='Se connecter';
                    $data['url_base'] = base_url(); 
                    $this->load->view('v_header', $data);
                    $this->load->view('v_acceuil_section', $data);
                    $this->load->view('v_sponsors');
                    $this->load->view('v_footer');
                }
                
                
                
	}
        public function login()
	{
                $this->load->model('login');
                $username = htmlspecialchars($_POST['login']);
                $password = htmlspecialchars($_POST['pass']);
                $result = $this->login->login2($username, $password);
                
                if($result)
                    {
                        $sess_array = array();
                        foreach($result as $row)
                        {
                            $sess_array = array(
                            'id' => $row->IDuser,
                            'username' => $row->login,
                            'actif' => $row->actif
                        );
                            $this->session->set_userdata('logged_in', $sess_array);
                        }  
                    }
                else
                    {
                    }	
                redirect('', 'refresh');
	}
        
        public function logout()
        {
            $this->session->unset_userdata('logged_in');
            session_destroy();         
            redirect('', 'refresh');
        }

        public function confirmation1()
        {

            $sess_array=$this->session->userdata('logged_in');
            $id=$sess_array['id'];

            $this->load->model('mail');
            $result = $this->mail->mail_id($id);

            $info = array();
            foreach($result as $row)
            {
                $info = array(
                'mail' => $row->mail
            );
            }
            $mail=$info['mail'];
            //echo $mail;

            $code_confirmation=rand ();
            $subject='Code de confirmation FestEsaip';
            $message="Votre code : ".$code_confirmation;

            

            $this->load->model('envoyer_mail');
            $result = $this->envoyer_mail->envoyer($mail, $subject, $message);


            if($result==TRUE)
             {
                $this->session->set_userdata('code_confirmation', $code_confirmation);
                redirect('accueil/confirmation2', 'refresh');  
             }
            
        }

        public function confirmation2()
        {
            $data = array();
            $this->load->model('login');
            $data['log_or_not'] = $this->login->login1();

            $data['url_base'] = base_url();
            $this->load->view('v_header', $data);
            $this->load->view('v_confirmation');
            $this->load->view('v_footer');
        }

        public function confirmation3()
        {
            $sess_array=$this->session->userdata('logged_in');

            $id=$sess_array['id'];

            $code_confirmation=$this->session->userdata('code_confirmation');

            $code = htmlspecialchars($_POST['code']);
            $this->load->model('confirmation_mail');
            $result = $this->confirmation_mail->confirmation($code, $code_confirmation, $id);




            $sess_array=$this->session->userdata('logged_in');
            $sess_array['actif']=1;
            $this->session->set_userdata('logged_in', $sess_array);

            redirect('', 'refresh');  
        }

        public function renvoyer_pass1()
        {
            $data = array();
            $this->load->model('login');
            $data['log_or_not'] = $this->login->login1();

            $data['url_base'] = base_url();
            $this->load->view('v_header', $data);
            $this->load->view('v_envoyer_mdp');
            $this->load->view('v_footer');
        }


        public function renvoyer_pass2()
        {

            $mail = htmlspecialchars($_POST['mail']);

            $this->load->model('mail');
            $result = $this->mail->verif_mail($mail);

            if ($result==1)
            {                
                $this->load->model('confirmation_mail');
                $result = $this->confirmation_mail->non_confirmation($mail);

                if($result==TRUE)
                {
                    $mdp=rand ();
                    $mdp=$mdp.rand ();                  

                    $subject='Votre mot de passe FestEsaip';
                    $message="Votre mdp : ".$mdp;


                    $this->load->model('envoyer_mail');
                    $result = $this->envoyer_mail->envoyer($mail, $subject, $message);

                    if($result==TRUE)
                    {
                        $this->load->model('login');
                        $this->login->modifier_pass($mdp, $mail);
                        echo "Nouveau mot de passe envoyé :) <br />" ;
                        echo ('<a href="'.base_url().'">Retourner à la page : accueil</a>'); 
                    }

                    else
                    {
                        echo "Erreur, nous ne pouvons envoyer de mail en ce moment :( <br />" ;
                        echo ('<a href="'.base_url().'">Retourner à la page : accueil</a>'); 
                    }
                }

                else
                {
                    echo "Erreur, nous ne pouvons accéder à la BDD en ce momement :( <br />" ;
                    echo ('<a href="'.base_url().'">Retourner à la page : accueil</a>'); 
                }

            }

            else
            {
                if($result==0)
                {
                    echo "Erreur, un nouveau mot de passe a déjà été envoyé :( <br />" ;
                    echo ('<a href="'.base_url().'">Retourner à la page : accueil</a>');
                    
                }
                else
                {
                    echo "Erreur, adresse mail inconnue :( <br />" ;
                    echo ('<a href="'.base_url().'">Retourner à la page : accueil</a>');
                }
                

            }
            
        }

}
