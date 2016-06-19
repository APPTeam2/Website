<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/** -
 * 
 * @author Antoine GUILLOT
 * @date 19/06/16
 * @version 1
 */

Class Ticket extends CI_Model
{

  function fest_actu()
  {
      $requete = "SELECT idFestival, dateDebut, dateFin FROM festival ORDER BY (dateDebut);";
      $result = $this->db->query($requete);

      $nb_fest=$result-> num_rows();

      if($nb_fest > 0)
      {
        $result= $result->row($nb_fest-1);
        $data=array('id_fest' => $result->idFestival, 'date_debut' => $result->dateDebut, 'date_fin' => $result->dateFin);
        return($data);
      }
      else
      {
        return (FALSE);
      }

  }

  function valider_ticket1($idUser, $nomTitulaire, $prenomTitulaire, $dateDebutBillet, $dateFinBillet, $idFestival)
  {
      $requete = "INSERT INTO billet (idUser, nomTitulaire, prenomTitulaire, dateDebutBillet, dateFinBillet, idFestival) VALUES ("
        .$this->db->escape($idUser).","
        .$this->db->escape($nomTitulaire).","
        .$this->db->escape($prenomTitulaire).","
        .$this->db->escape($dateDebutBillet).","
        .$this->db->escape($dateFinBillet).","
        .$this->db->escape($idFestival)
        .");";
      $result = $this->db->query($requete);

      if($result)
      {
        return(TRUE);
      }
      else
      {
        return (FALSE);
      }

  }

}
