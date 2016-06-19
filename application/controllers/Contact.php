<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** Contrôleur Contact
 * 
 * @author Adrien PIRONNEAU
 * @source Antoine GUILLOT
 * @date 19/06/2016
 * @rev 02
 */

class Contact extends CI_Controller
{      
        public function formulaire()
        {
            $data = array();
            
            $this->load->model('login');
            $data['log_or_not'] = $this->login->login1();
                
            $data['url_base'] = base_url();
            $this->load->view('v_header', $data);
	        $this->load->view('v_contact', $data);
	        $this->load->view('v_footer');
            
        }
    
    
        function sendMail() 
        {
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

            
            $pseudo_contact = htmlspecialchars($_POST['pseudo_contact']);
            $mail_contact = htmlspecialchars($_POST['mail_contact']);
            $titre_contact = htmlspecialchars($_POST['titre_contact']);
            $texte_contact = htmlspecialchars($_POST['texte_contact']);
            
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->set_newline("\r\n"); 
            $this->email->to('finlandblogproject@gmail.com');
            $this->email->subject($mail_contact);
            $this->email->message($texte_contact);

            if($this->email->send())
            {
                return(TRUE);
            }
            else
            {
                //show_error($this->email->print_debugger());
                redirect('accueil/message', 'refresh'); 
            }
      
        }
}