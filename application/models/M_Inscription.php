<?php
/**
 * Description of Inscription
 *
 * @author Antoine RICHARD
 */
class M_Inscription {
    
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
                    ORDER BY `festival`.`theme` DESC";


        $query = $this->db->query($requete);
        return $query->result();
    }
}
