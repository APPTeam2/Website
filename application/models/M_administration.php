<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** -
 * 
 * @author Florian Levenez-Delafontaine
 * @date 14/06/16
 * @version 0.1
 */

Class M_administration extends CI_Model {

    function users() {
        $requete = "SELECT login, nomUser, prenomUser, mail FROM utilisateur";
        $query = $this->db->query($requete);
        return $query->result();
    }
    
    function artiste(){
        $requete = "SELECT * FROM artiste";
        $query = $this->db->query($requete);
        return $query->result();
    }
    
    function reservation(){
        $requete = "SELECT
                        theme, nomTitulaire, prenomTitulaire, nomUser, prenomUser, mail 
                    FROM 
                        utilisateur 
                    INNER Join billet 
                        ON billet.idUser=utilisateur.idUser
                    INNER JOIN  festival  
                        ON billet.idfestival=festival.idfestival";
        $query = $this->db->query($requete);
        return $query->result();
        
    }

}
?>

