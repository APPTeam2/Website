<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** -
 * 
 * @author Antoine GUILLOT
 * @date 08/06/16
 * @version 1
 */

class Historique extends CI_Controller
{      
        public function c1()
        {
        	$sess_array=$this->session->userdata('logged_in');
        	$data = array();
			if($sess_array['username']!=NULL)
                {
                    $data['log_or_not']='<a href="'.  base_url() .'accueil/logout">Se déconnecter</a></li>';
                }
            else 
                {
                    $data['log_or_not']='Se connecter';
                }
                
            $data['url_base'] = base_url();
            $this->load->view('v_header', $data);                    
            $this->load->model('M_historique');
            $result = $this->M_historique->historique();
            $tableau=array();
            $i=0;
              foreach($result as $row)
            {
                $tableau[$i] = array('nom' => $row->nom);
                $i++;
            }
            $data['Trucdeflo']=$tableau; 
            $this->load->view('v_FestESAIP', $data);
            
	        $this->load->view('v_footer');            
        }
}