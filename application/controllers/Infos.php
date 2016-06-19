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
        public function camping()
        {
            $data = array();
            
            $this->load->model('login');
            $data['log_or_not'] = $this->login->login1();
                
            $data['url_base'] = base_url();
            $this->load->view('v_header', $data);
	        $this->load->view('v_camping', $data);
	        $this->load->view('v_footer');
            
        }
    
        public function access()
        {
            $data = array();
            
            $this->load->model('login');
            $data['log_or_not'] = $this->login->login1();
                
            $data['url_base'] = base_url();
            $this->load->view('v_header', $data);
	        $this->load->view('v_access', $data);
	        $this->load->view('v_footer');
            
        }
    
            public function come()
        {
            $data = array();
            
            $this->load->model('login');
            $data['log_or_not'] = $this->login->login1();
                
            $data['url_base'] = base_url();
            $this->load->view('v_header', $data);
	        $this->load->view('v_come', $data);
	        $this->load->view('v_footer');
            
        }
}