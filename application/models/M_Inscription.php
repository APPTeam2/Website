<?php
/** Modele de la page Inscription
 * 
 * @author Antoine RICHARD
 * @date 19/06/2016
 * @version 1
 */
class M_Inscription extends CI_Model{

    function getAllLogin() {
        $requete = "SELECT 
                            login, mail
                    FROM 
                            utilisateur 
                                    ";


        $query = $this->db->query($requete);
        return $query->result();
    }
    function getAllMail() {
        $requete = "SELECT 
                            login, mail
                    FROM 
                            utilisateur 
                                    ";


        $query = $this->db->query($requete);
        return $query->result();
    }

    function insertUser($nom, $prenom, $mail, $civilite, $mdp, $login) {
        $password = password_hash($mdp, PASSWORD_BCRYPT);
        $requete = "INSERT INTO utilisateur (login, password, nomUser, prenomUser, civilite, mail, actif) VALUES ("
                . $this->db->escape($login) . ","
                . $this->db->escape($password) . ","
                . $this->db->escape($nom) . ","
                . $this->db->escape($prenom) . ","
                . $this->db->escape($civilite) . ","
                . $this->db->escape($mail) . ","
                . "0"
                . ");";
        $result = $this->db->query($requete);

        if ($result) {
            return(TRUE);
        } else {
            return (FALSE);
        }
    }

}
