<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** -
 * 
 * @author Antoine GUILLOT
 * @date 08/06/16
 * @version 1
 */

class Inscription_Ticket extends CI_Controller
{      
    public function c1()
    {
        $this->load->model('login');
        $login = $this->login->recuperer_login();  
        if($login!=FALSE)
        {
	        redirect('Inscription_Ticket/ticket', 'refresh');
        }
        else
        {
            $sess_array=$this->session->userdata('logged_in');
            if($sess_array['actif']==0 and $sess_array['id']!=0)
            {
                $data=array();
                $data['code']=8;            
                $this->session->set_flashdata('code', $data);
                redirect('accueil/message', 'refresh');
            }
            else
            {
                redirect('Inscription/afficherFormulaire', 'refresh');
            }

            
            //redirect('Tickets/c_tickets', 'refresh');
        }       
    }

    public function ticket()
    {
        $data = array();
        $this->load->model('login');
        $data['log_or_not'] = $this->login->login1();
        $data['url_base'] = base_url();

        $this->load->view('v_header', $data);
        $this->load->view('v_tickets');
        $this->load->view('v_footer');
    }

    public function valider_ticket()
    {
        /*
        Il faudrait prendre en compte le nombre de place restantes...
        */
        $nomTitulaire = htmlspecialchars($_POST['nom']);
        $prenomTitulaire = htmlspecialchars($_POST['prenom']);
        $date = htmlspecialchars($_POST['date']);

        $this->load->model('ticket');
        $this->load->model('login');
        $result = $this->ticket->fest_actu();

        if ($result!=0)
        {

            $login = $this->login->recuperer_login();
            if($login!=FALSE)
            {
                $sess_array=$this->session->userdata('logged_in');
                $idUser= $sess_array['id'];

                if($date=="date_1")
                {
                    $dateDebutBillet=$result['date_debut'];
                    $dateFinBillet=$result['date_debut'];
                }
                elseif ($date=="date_2") 
                {
                    $date_2=$result['date_debut'];
                    $date_2[9]=$date_2[9]+1;
                    /*Cela ne fonctionne pas si le festival débute le dernier jour de mois...*/
                    $dateDebutBillet=$date_2;
                    $dateFinBillet=$date_2;
                }
                elseif ($date=="date_3") 
                {
                    $dateDebutBillet=$result['date_fin'];
                    $dateFinBillet=$result['date_fin'];
                }
                elseif ($date=="date_4") 
                {
                    $dateDebutBillet=$result['date_debut'];
                    $dateFinBillet=$result['date_fin'];
                }

                $idFestival=$result['id_fest'];

                $this->load->model('mail');
                $result = $this->mail->mail_id($idUser);
                $info = array();
                foreach($result as $row)
                {
                    $info = array(
                    'mail' => $row->mail
                );
                }
                $mail=$info['mail'];
                $this->load->model('envoyer_mail');

                $subject="Confirmation ticket Fest'Esaip";
                $message="Nom : ".$nomTitulaire." Prenom : ".$prenomTitulaire." Date debut : ".$dateDebutBillet." Date fin : ".$dateFinBillet;

                $result = $this->envoyer_mail->envoyer($mail, $subject, $message); 

                if($result==TRUE)
                {
                    $result = $this->ticket->valider_ticket1($idUser, $nomTitulaire, $prenomTitulaire, $dateDebutBillet, $dateFinBillet, $idFestival);
                    if($result==TRUE)
                    {
                        $data = array();
                        $data['url_base'] = base_url();
                        $data['log_or_not'] = $this->login->login1();
                        $data['code_erreur']="Votre ticket a bien été enregistré ! Un mail vous a été envoyé:)";
                        $this->load->view('v_header', $data);
                        $this->load->view('v_message3');
                        $this->load->view('v_footer');
                    }
                    else
                    {
                        $data=array();
                        $data['code']=3;            
                        $this->session->set_flashdata('code', $data);
                        redirect('accueil/message', 'refresh');
                    }
                }

            }
            
            else
            {
                $data=array();
                $data['code']=7;            
                $this->session->set_flashdata('code', $data);
                redirect('accueil/message', 'refresh');
            }
        }

        else
        {
            $data=array();
            $data['code']=3;            
            $this->session->set_flashdata('code', $data);
            redirect('accueil/message', 'refresh');
        }

    }

    public function contact()
    {
        $message1 = htmlspecialchars($_POST['texte_contact']);
        $email = htmlspecialchars($_POST['mail_contact']);

        $this->load->model('envoyer_mail');
        $subject="Formulaire de contact";
        $mail='finlandblogproject@gmail.com';
        $message="De : ".$email." Message : ".$message1;
        $this->envoyer_mail->envoyer($mail, $subject, $message); 

        redirect('', 'refresh');

    }
}