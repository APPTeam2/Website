<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** Pages Infos Pratiques
 * 
 * @author Adrien Pironneau
 * @source Antoine GUILLOT
 * @date 08/06/2016
 * @rev 01
 */

class Infos extends CI_Controller
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
	        $this->load->view('v_access', $data);
	        $this->load->view('v_footer');
            
        }
}