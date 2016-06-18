<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** Contrôleur Contact
 * 
 * @author Adrien PIRONNEAU
 * @source Antoine GUILLOT
 * @date 18/06/2016
 * @rev 01
 */

class Contact extends CI_Controller
{      
        public function formulaire()
        {
            $sess_array=$this->session->userdata('logged_in');
            $data = array();
            
            $this->load->model('login');
            $data['log_or_not'] = $this->login->login1();
                
            $data['url_base'] = base_url();
            $this->load->view('v_header', $data);
	        $this->load->view('v_contact', $data);
	        $this->load->view('v_footer');
            
        }
}