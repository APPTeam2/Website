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
    
    
          //v 
        function sendform()
        {


            $pseudo_contact = htmlspecialchars($_POST['pseudo_contact']);
            $mail_contact = htmlspecialchars($_POST['mail_contact']);
            $titre_contact = htmlspecialchars($_POST['titre_contact']);
            $texte_contact = htmlspecialchars($_POST['texte_contact']);
    
            try
            {
                // Initilisation PDO
                $bdd = new PDO('mysql:host=localhost;dbname=test3', 'root', '');
            }
 
            catch (Exception $e)
            {
                // En cas d'erreur : message puis exit
                die('Erreur : ' . $e->getMessage());
            }
    
            
            //Requete SQL
            $req = $PDO->prepare("INSERT INTO `contact` (`pseudo_contact`, `mail_contact`, `titre_contact`, `texte_contact`) VALUES (:pseudo_contact, :mail_contact, :titre_contact, :texte_contact)");
            $req->execute(array(
            ':pseudo_contact' => $pseudo_contact, 
            ':mail_contact' => $mail_contact,
            ':titre_contact' => $titre_contact,
            ':texte_contact' => $texte_contact
            ));
            
            echo($pseudo_contact);
  
        }
}