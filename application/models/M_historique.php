<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
Class M_historique extends CI_Model
{
function historique()
{
$requete = "Select nom FROM artiste";
$query = $this->db->query($requete);
return $query->result();
}
}
?>

