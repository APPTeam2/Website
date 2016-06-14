<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/** -
 * 
 * @author Antoine GUILLOT
 * @date 08/06/16
 * @version 1
 */

Class Envoyer_mail extends CI_Model {

    function envoyer($to, $subject, $message) 
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

      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->set_newline("\r\n");
      $this->email->from('finlandblogproject@gmail.com'); 
      $this->email->to($to);
      $this->email->subject($subject);
      $this->email->message($message);

      if($this->email->send())
       {
          return(TRUE);
       }
       else
      {
         //show_error($this->email->print_debugger());
        echo "Erreur, veuillez contacter l'administrateur :( <br />" ;
        echo ('<a href="'.base_url().'">Retourner à la page : accueil</a>');
      }
      
  }

}
?>
