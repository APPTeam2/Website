<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class M_historique extends CI_Model {

    function historique() {
        $requete = "SELECT 
                            DISTINCT festival.theme, artiste.nomArtiste 
                    FROM 
                            festival 
                                    INNER JOIN CONCERT 
                                            ON CONCERT.idfestival=festival.idFestival 
                                    INNER JOIN jouer
                                            ON concert.idConcert=jouer.idConcert 
                                    INNER JOIN artiste
                                            ON jouer.idArtiste=artiste.idArtiste 
                    ORDER BY `festival`.`theme` ASC";


        $query = $this->db->query($requete);
        return $query->result();
    }

}
?>

