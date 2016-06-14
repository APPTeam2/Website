<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class M_programmation extends CI_Model {

    function concerts() {
        $requete = "SELECT 
                            DISTINCT artiste.nomArtiste, DATE_FORMAT(concert.dateConcert, '%d/%m/%Y') AS `dateConcert`, concert.heureDebut 
                    FROM 
                            festival 
                                    INNER JOIN CONCERT 
                                            ON concert.idFestival=festival.idFestival 
                                    INNER JOIN jouer
                                            ON concert.idConcert=jouer.idConcert 
                                    INNER JOIN artiste
                                            ON jouer.idArtiste=artiste.idArtiste 
                    WHERE festival.dateDebut=(SELECT MAX(festival.dateDebut) FROM festival)
                    ORDER BY `concert`.`dateConcert` ASC, `concert`.`heureDebut` ASC";


        $query = $this->db->query($requete);
        return $query->result();
    }

}
?>
