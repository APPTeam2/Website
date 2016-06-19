<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** -
 * 
 * @author Antoine GUILLOT
 * @date 08/06/16
 * @version 4
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
                        $this->load->view('v_acceuil_section');
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
                    $this->load->view('v_acceuil_section');
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
                        $sess_array = $result;
                        $this->session->set_userdata('logged_in', $sess_array);                   
                        redirect('', 'refresh');
                    }
                else
                    {
                        $data=array();
                        $data['code']=6;            
                        $this->session->set_flashdata('code', $data);
                        redirect('accueil/message', 'refresh');
                    }	
                
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
            $data = array();
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
                        $data['code']=1;
                    }
                    else
                    {
                        $this->confirmation_mail->non_confirmation($mail);
                        /*peut engndrer une activation de compte, mais la personne
                         n'ayant pas le mdp, ne pourra s'y connecter, sinon cela permet 
                         d'outrepasser la verif de mail si le serveur mail est down*/
                        $data['code']=2;   
                    }
                }
                else
                {
                    $this->confirmation_mail->non_confirmation($mail);
                    $data['code']=3;  
                }
            }
            else
            {
                if($result==0)
                {
                    $data['code']=4;           
                }
                else
                {
                    $data['code']=5;            
                }                
            }
            $this->session->set_flashdata('code', $data);
            redirect('accueil/message', 'refresh');
        }

        public function message()
        {
            $data=array();
            $code_erreur=$this->session->flashdata('code')['code'];


            if ($code_erreur==1)
            {
                $data['code_erreur']="Nouveau mot de passe envoyé :) <br />";
            }
            elseif ($code_erreur==2) 
            {
                $data['code_erreur']="Erreur, nous ne pouvons envoyer de mail en ce moment :( <br />" ;
            }
            elseif ($code_erreur==3) 
            {
                $data['code_erreur']="Erreur, nous ne pouvons accéder à la BDD en ce momement :( <br />" ;
            }
            elseif ($code_erreur==4) 
            {
                $data['code_erreur']="Erreur, un nouveau mot de passe a déjà été envoyé :( <br />" ;
            }
            elseif ($code_erreur==5) 
            {
                $data['code_erreur']="Erreur, adresse mail inconnue :( <br />" ;
            }
            elseif ($code_erreur==6)
            {
                $data['code_erreur']="Login ou mdp incorrect :( <br />";
            }
            elseif ($code_erreur==7)
            {
                $data['code_erreur']="Il semblerait que vous ne soyez pas connecté :( <br />";
            }
            elseif ($code_erreur==8)
            {
                $data['code_erreur']="Il semblerait que votre compte ne soit pas activé :( <br />";
            }
            elseif ($code_erreur==9)
            {
                $data['code_erreur']="Il semblerait que le formulaire ne soit pas correctement complété :( <br />";
            }
            elseif ($code_erreur==10)
            {
                $data['code_erreur']="Il ne vous reste plus qu'à vous connecter et confirmer votre adresse mail :) <br />";
            }
            else
            {
                $data['code_erreur']="Erreur inconnue :'( <br />Veuiller contacter un administrateur.";
            }
            $data['url_base'] = base_url();
            $this->load->model('login');
            $data['log_or_not'] = $this->login->login1();

            $this->load->view('v_header', $data);
            $this->load->view('v_message');
            $this->load->view('v_footer');
        }

}
