<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/** -
 * 
 * @author Antoine GUILLOT
 * @date 08/06/16
 * @version 1
 */

Class Mail extends CI_Model
{
  function mail_id($id)
  {

      $requete = "select mail from utilisateur WHERE idUser=".$this->db->escape($id).";";
      $result = $this->db->query($requete);
      return $result->result();


  }

  function verif_mail($mail)
  {
      $requete = "select actif from utilisateur WHERE mail=".$this->db->escape($mail).";";
      $result = $this->db->query($requete);

      if($result -> num_rows() == 1)
      {
        $result= $result->row(0);
        $result=$result->actif;

        return($result);
      }
      else
      {
        return (2);
      }

}

}
