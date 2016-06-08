<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/** -
 * 
 * @author Antoine GUILLOT
 * @date 08/06/16
 * @version 1
 */

Class User extends CI_Model
{
 function login($username, $password)
 {
   $requete = "select IDuser, login from utilisateur WHERE login='".$username."' and password='".MD5($password)."'";
   $result = $this->db->query($requete);
   
   if($result -> num_rows() == 1)
   {
     return $result->result();
   }
   else
   {
     return false;
   }
 }
}
