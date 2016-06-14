<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** Contrôleur Infos Pratiques
 * 
 * @author Adrien PIRONNEAU
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
            
            $this->load->model('login');
            $data['log_or_not'] = $this->login->login1();
                
            $data['url_base'] = base_url();
            $this->load->view('v_header', $data);
	        $this->load->view('v_access', $data);
	        $this->load->view('v_footer');
            
        }
}