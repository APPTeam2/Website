<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class M_programmation extends CI_Model {

    function requete()
    {
        $requete = "SELECT 
                            DISTINCT artiste.nomArtiste,
                            DATE_FORMAT(concert.dateConcert, '%W') AS `jourConcert`,
                            DATE_FORMAT(concert.dateConcert, '%d %m %Y') AS `dateConcert`,
                            DATE_FORMAT(concert.heureDebut, '%H : %i') AS `heureDebut` 
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
    
    function concerts()
    {
        $query=$this->requete();
        $rep=array();
        
        foreach($query as $row)
        {
            array_push($rep, $row->nomArtiste, $row->jourConcert, $row->dateConcert, $row->heureDebut);
        }
        
        $length = count($rep);
        
                for ($i = 0; $i < $length; $i = $i + 4)
                {   
                    $jour_sem=$rep[$i + 1];
                    $date=$rep[$i + 2];
                    $jour=$date[0].$date[1];
                    $mois=$date[3].$date[4];
                    $annee=$date[6].$date[7].$date[8].$date[9];
                    $heure=$rep[$i + 3];
                    
                    if($jour_sem=="Monday") {$jour_sem="Lundi";}
                    elseif($jour_sem=="Tuesday") {$jour_sem="Mardi";}
                    elseif($jour_sem=="Wednesday") {$jour_sem="Mercredi";}
                    elseif($jour_sem=="Thursday") {$jour_sem="Jeudi";}
                    elseif($jour_sem=="Friday") {$jour_sem="Vendredi";}
                    elseif($jour_sem=="Saturday") {$jour_sem="Samedi";}
                    elseif($jour_sem=="Sunday") {$jour_sem="Dimanche";}
                    
                    if($jour[0]=="0") {$jour=$jour[1];}
                    if($jour=="1"){$jour=$jour."<sup>er</sup>";}
                    
                    if($mois=="01") {$mois="Janvier";}
                    elseif($mois=="02") {$mois="Février";}
                    elseif($mois=="03") {$mois="Mars";}
                    elseif($mois=="04") {$mois="Avril";}
                    elseif($mois=="05") {$mois="Mai";}
                    elseif($mois=="06") {$mois="Juin";}
                    elseif($mois=="07") {$mois="Juillet";}
                    elseif($mois=="08") {$mois="Août";}
                    elseif($mois=="09") {$mois="Septembre";}
                    elseif($mois=="10") {$mois="Octobre";}
                    elseif($mois=="11") {$mois="Novembre";}
                    elseif($mois=="12") {$mois="Décembre";}
                   
                    $rep[$i+1]="Le ".$jour_sem;
                    $rep[$i+2]=" ".$jour." ".$mois." ".$annee;
                    $rep[$i+3]=$heure;
                }    
        return $rep;
    }
}
?>
