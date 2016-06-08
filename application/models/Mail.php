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

      $requete = "select mail from utilisateur WHERE idUser='".$id."'";
      $result = $this->db->query($requete);
      return $result->result();


 }
}
