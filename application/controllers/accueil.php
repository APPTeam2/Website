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
                        $this->load->view('v_footer');
                    }
                    else
                    {
                        //echo $sess_array['actif'];
                        redirect('accueil/confirmation1', 'refresh'); 
                    }
                }
                else 
                {
                    $data['log_or_not']='Se connecter';
                    $data['url_base'] = base_url(); 
                    $this->load->view('v_header', $data);
                    $this->load->view('v_acceuil_section', $data);
                    $this->load->view('v_footer');
                }
                
                
                
	}
        public function login()
	{
                $this->load->model('user');
                $username = htmlspecialchars($_POST['login']);
                $password = htmlspecialchars($_POST['pass']);
                $result = $this->user->login($username, $password);
                
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


            $config = Array
            (
              'protocol' => 'smtp',
              'smtp_host' => 'ssl://smtp.googlemail.com',
              'smtp_port' => 465,
              'smtp_user' => 'finlandblogproject@gmail.com', // change it to yours
              'smtp_pass' => 'finland2016', // change it to yours
              'mailtype' => 'html',
              'charset' => 'iso-8859-1',
              'wordwrap' => TRUE
            );

            $code_confirmation=rand ();


             $message = '';
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->set_newline("\r\n");
            $this->email->from('finlandblogproject@gmail.com'); // change it to yours
            $this->email->to($mail);// change it to yours
            $this->email->subject('Code de confirmation FestEsaip');
            $this->email->message("Votre code :".$code_confirmation);  

            if($this->email->send())
             {
                $this->session->set_userdata('code_confirmation', $code_confirmation);
                redirect('accueil/confirmation2', 'refresh');  
             }
             else
            {
             //show_error($this->email->print_debugger());
            echo "Erreur, veuillez contacter l'administrateur :(" ;
            }
            
        }

        public function confirmation2()
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

}
