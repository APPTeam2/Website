<?php 

Class Mail extends CI_Model
{
 function mail_id($id)
 {

      $requete = "select mail from utilisateur WHERE idUser='".$id."'";
      $result = $this->db->query($requete);
      return $result->result();


 }
}
