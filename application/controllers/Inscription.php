<?php
/** Controleur de la page Inscription
 * 
 * @author Antoine RICHARD
 * @date 07/06/2016
 * @version 0.4
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription extends CI_Controller {

    function afficherFormulaire() {
        $sess_array = $this->session->userdata('logged_in');
        $data = array();
        if ($sess_array['username'] != NULL) {
            $data['log_or_not'] = '<a href="' . base_url() . 'accueil/logout">Se déconnecter</a></li>';
        } else {
            $data['log_or_not'] = 'Se connecter';
        }

        $data['url_base'] = base_url();
        $this->load->view('v_header', $data);
        $this->load->view('v_centreInscription');
        $this->load->view('v_footer');
    }

    // Fonction d'affichage du formulaire de création d'une personne
    function creerPersonne() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Création d\'une personne');
        // ... depuis la BDD       
        $daoPers = new M_DaoPersonne();
        $daoPers->connecter();
        $pdo = $daoPers->getPdo();

        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        $this->vue->ecrireDonnee('centre', "../vues/includes/adminPersonnes/centreCreerPersonne.inc.php");

        $this->vue->afficher();
    }

    //validation de création d'utilisateur 
    function validationcreerPersonne() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', "Validation de la création d'une personne");

        $civilite = $_POST['civilite'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $numTel = $_POST['tel'];
        $mobile = $_POST['telP'];

        $login = $_POST['login'];
        $mdp = sha1($_POST['mdp']);

        $unePersonne = new M_Personne(null, $specialite, $role, $civilite, $nom, $prenom, $numTel, $mail, $mobile, $etudes, $formation, $login, $mdp);
        $daoPers = new M_DaoPersonne();
        $daoPers->connecter();
        $pdo = $daoPers->getPdo();
        $daoPers->insert($unePersonne);

        if (($anneeScol != null && $numClasse != null) || ($idOrganisation != null && $fonction != null)) {
            //on rappelle la meme personne pour obtenir son id (qui est auto-incrémenté en base)
            $laMemePersonne = new M_Personne(null, null, null, null, null, null, null, null, null, null, null, null, null);
            $laMemePersonne = $daoPers->getOneByLogin($login);
            $idPersonne = $laMemePersonne->getId();

            if ($anneeScol != null && $numClasse != null) {
                $unePromotion = new M_Promotion($anneeScol, $idPersonne, $numClasse);
                $daoPromotion = new M_DaoPromotion();
                $daoPromotion->connecter();
                $pdo = $daoPromotion->getPdo();
                $daoPromotion->insert($unePromotion);
            }
            if ($idOrganisation != null && $fonction != null) {
                $unContactOrganisation = new M_Contact_Organisation($idOrganisation, $idPersonne, $fonction);
                $daoContactOrganisation = new M_DaoContact_Organisation();
                $daoContactOrganisation->connecter();
                $pdo = $daoContactOrganisation->getPdo();
                $daoContactOrganisation->insert($unContactOrganisation);
            }
        }

        if ($daoPers) {

            $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreValiderCreationPersonne.php");
        }

        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        $this->vue->afficher();
    }

}
