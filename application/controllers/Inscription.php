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
        $mdp = htmlspecialchars(md5($_POST['mdp']));

        $data = array(
            'login' => $login,
            'password' => $mdp,
            'nomUser' => $nom,
            'prenomUser' => $prenom,
            'civilite' => $civilite,
            'mail' => $mail
        );

        $this->db->insert('utilisateur', $data);


        $this->load->model('login');
        $data['log_or_not'] = $this->login->login1();

        $data['url_base'] = base_url();
        $this->load->view('v_header', $data);
        $this->load->view('v_centreValiderCreationPersonne');
        $this->load->view('v_footer');
    }

}
