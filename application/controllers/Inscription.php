<?php

/** Controleur de la page Inscription
 * 
 * @author Antoine RICHARD
 * @date 19/06/2016
 * @version 1
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription extends CI_Controller {

    function afficherFormulaire() {
        $this->load->model('login');
        $data['log_or_not'] = $this->login->login1();

        $data['url_base'] = base_url();
        $this->load->view('v_header', $data);
        $this->load->view('v_centreInscription');
        $this->load->view('v_footer');
    }

    //validation de création d'utilisateur 
    function validationcreerPersonne() {
        $civilite = htmlspecialchars($_POST['civilite']);
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $mail = htmlspecialchars($_POST['mail']);

        $login = htmlspecialchars($_POST['login']);
        $mdp = htmlspecialchars($_POST['mdp']);

        if ($nom != "" and $prenom != "" and $mail != "" and $civilite != "" and $mdp != "" and $login != "") {

            $this->load->model('M_Inscription');
            $allLogin = $this->M_Inscription->getAllLogin();
            $allMail = $this->M_Inscription->getAllMail();
            $verifLoginMail = 0;
            foreach ($allLogin as $row) {
                if ($login != $row->login) {
                    $data = array();
                    $data['code'] = 10;
                    $this->session->set_flashdata('code', $data);
                    redirect('accueil/message', 'refresh');
                } else {
                    $verifLoginMail = 1;
                }
            }
            foreach ($allMail as $row) {
                if ($mail != $row->mail) {
                    $data = array();
                    $data['code'] = 10;
                    $this->session->set_flashdata('code', $data);
                    redirect('accueil/message', 'refresh');
                } else {
                    $verifLoginMail = 1;
                }
            }

            if ($verifLoginMail = 1) {
                $result = $this->M_Inscription->insertUser($nom, $prenom, $mail, $civilite, $mdp, $login);

                if ($result == TRUE) {
                    $this->load->model('login');
                    $data['log_or_not'] = $this->login->login1();

                    $data['url_base'] = base_url();
                    $this->load->view('v_header', $data);
                    $this->load->view('v_centreValiderCreationPersonne');
                    $this->load->view('v_footer');
                } else {
                    $data = array();
                    $data['code'] = 9;
                    $this->session->set_flashdata('code', $data);
                    redirect('accueil/message', 'refresh');
                }
            } else {
                $data = array();
                $data['code'] = 9;
                $this->session->set_flashdata('code', $data);
                redirect('accueil/message', 'refresh');
            }
        }
    }

}
