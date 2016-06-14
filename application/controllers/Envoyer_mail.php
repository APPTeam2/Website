<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/** -
 * 
 * @author Antoine GUILLOT
 * @date 08/06/16
 * @version 1
 */

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