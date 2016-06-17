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
         $requete = "update utilisateur SET actif = '1' WHERE idUser=".$this->db->escape($id).";";
         $result = $this->db->query($requete);

         return true;

      }  
      else
      {
         return false;
      }
   }

   function non_confirmation($mail)
   {
      $requete = "select actif FROM utilisateur WHERE mail=".$this->db->escape($mail).";";
      $result = $this->db->query($requete);

      $result= $result->row(0);
            
      $result=$result->actif;

      if ($result==1)
      {
         $requete = "update utilisateur SET actif = '0' WHERE mail=".$this->db->escape($mail).";";
         $this->db->query($requete);
         return(TRUE);
      }

      else
      {
         return(FALSE);
      }

      
   }
}
