<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
/** -
 * 
 * @authors ,Florian Levenez-Delafontaine
 * @date 08/06/16
 * @version 1.2
 */

class Administration extends CI_Controller
{      
        public function c1()
        {
            $sess_array=$this->session->userdata('logged_in');
            $login=$sess_array['username'];

            if($login=="admin")
            {
                $data['url_base'] = base_url();
                
                $this->load->model('M_administration');
                $result = $this->M_administration->users();
                $data['T_users']=$result; 
                $result = $this->M_administration->artiste();
                $data['T_artiste']=$result; 
                $result = $this->M_administration->reservation();
                $data['T_reservation']=$result;
                $this->load->view('v_Administration', $data);    
            }
            else
            {
                redirect('','refresh');
            }

       
        }
}