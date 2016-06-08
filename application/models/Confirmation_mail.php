<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/** -
 * 
 * @author Antoine GUILLOT
 * @date 08/06/16
 * @version 1
 */

Class Confirmation_mail extends CI_Model
{
 function confirmation($code, $code_confirmation, $id)
 {

   if($code == $code_confirmation)
   {
      $requete = "update utilisateur SET actif = '1' WHERE idUser='".$id."'";
      $result = $this->db->query($requete);

      return true;

   }
   else
   {
      return false;
   }
 }
}
